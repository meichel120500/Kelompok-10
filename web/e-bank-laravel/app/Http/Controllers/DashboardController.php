<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user_id = session()->get('id');

        $bank = DB::table('data_transaksi_bank')
            ->where('user_id', $user_id)
            ->first();

        if (!$bank) {
            return redirect()->route('logout')->with("error", 'Data bank not found');
        }

        return view('dashboard', compact('bank'));
    }
}


