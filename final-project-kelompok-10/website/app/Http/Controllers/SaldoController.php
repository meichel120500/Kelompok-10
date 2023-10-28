<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaldoController extends Controller
{
    public function index()
    {
        $user_id = session()->get('id');
        $currency_mode = session()->get('currency_mode');
        
        $saldo_rupiah = DB::table('balance')
            ->select('saldo')
            ->where(['id_user' => $user_id, 'id_currency' => $id_rupiah])
            ->first();

        $saldo_exchange = DB::table('balance')
            ->select('saldo')
            ->where(['id_user' => $user_id, 'id_currency' => $currency_mode])
            ->first();

        $money_transfer = DB::table('transaction')
            ->select('jml_mata_uang_digital')
            ->where(['status_transaksi' => 'success', 'id_user' => $user_id, 'metode_pembayaran' => $id_metode_payment])
            ->first();
        

        $money_income = DB::table('transaction')
        ->select('jml_mata_uang_digital')
        ->where(['status_transaksi' => 'success', 'id_user' => $user_id, 'metode_pembayaran' => $id_metode_income])
        ->first();

        return view('saldo', compact('money_income', 'money_transfer', 'saldo_exchange', 'saldo_rupiah'));
    }
}


