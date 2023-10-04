<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    public function index()
    {
        if(session()->has('id')){
            return redirect("/");
        }
        return view('login');
    }

    public function submit_login(Request $request)
    {  
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Parameter email is required.',
            'email.email' => 'Parameter email must be a valid email address.',
            'password.required' => 'Parameter password is required.',
        ]);


        $email = $request->input('email');
        $password = $request->input('password');

        // Find the user by email
        $user = DB::table('users')
            ->select('id', 'username', 'email', 'hash_password')
            ->where('email', $email)
            ->first();

        if (!$user) {
            return redirect()->back()->with("error", 'Email atau Password salah!');
        }

        // Verify the password
        if (!Hash::check($password, $user->hash_password)) {
            return redirect()->back()->with("error", 'Email atau Password salah!');
        }

        session()->put('id', $user->id);
        session()->put('username', $user->username);
        session()->put('email', $user->email);


        return redirect()->route('dashboard');
    }

    public function sign_up(Request $request)
    {
        return view('sign_up');
    }

    public function submit_sign_up(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'first-name' => 'required|string',
            'last-name' => 'required|string',
            'username' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email'),
            ],
            'password' => 'required|string',
        ], [
            'email.unique' => 'Email yang diinput sudah ada.',
        ]);

        $first_name = $request->input('first-name');
        $last_name = $request->input('last-name');
        $name = trim($first_name . " " . $last_name);

        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');

        // Check if the username or email is already registered
        $userExists = DB::table('users')
            ->where('email', $email)
            ->exists();

        if ($userExists) {
            return redirect()->back()->with("error", "Email yang diinput sudah ada");
        }

        // Hash the password
        $hash_password = Hash::make($password);

        // Create a new user
        $userId = DB::table('users')->insertGetId([
            'username' => $username,
            'email' => $email,
            'hash_password' => $hash_password,
        ]);

        if (!$userId) {
            return redirect()->back()->with('error', "Ada masalah pada server");
        }

        // Create a bank account for the user
        DB::table('data_transaksi_bank')->insert([
            'user_id' => $userId,
            'nama' => $nama,
            'nilai_saldo' => 0,
        ]);

        return redirect()->route('login')->with("success", "Akun berhasil dibuat!");
    }
}


