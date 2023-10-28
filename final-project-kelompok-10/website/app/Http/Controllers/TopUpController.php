<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopUpController extends Controller
{
    public function index()
    {
        return view('top_up');
    }

    public function submit_top_up(Request $request)
    {
        $saldo_topup = $request->input('jumlah_top_up');

        $user_id = session()->get('id');
        $currency_mode = session()->get('currency_mode');

        $res = DB::table('balance')->select(['saldo'])->where(['id_user' => $user_id, 'id_currency' => 1])->first();

        $saldo = $res->saldo;

        $saldo += $saldo_topup;

        DB::table('balance')->update(['saldo' => $saldo])->where(['id_user' => $user_id, 'id_currency' => 1]);
        DB::table('transaction')->insert([
            'id_user' => $user_id,
            'tanggal' => date('Y-m-d'),
            'jml_mata_uang_digital' => $saldo_topup,
            'metode_pembayaran' => 'top up',
            'status' => 'success'
        ]);


        return response()->json(['success' => true], 200);
    }
}


