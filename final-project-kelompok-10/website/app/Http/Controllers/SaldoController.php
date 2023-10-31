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
            ->where(['id_user' => $user_id, 'id_currency' => 1])
            ->first();

        $saldo_exchange = DB::table('balance')
            ->select('saldo')
            ->where(['id_user' => $user_id, 'id_currency' => $currency_mode])
            ->first();


        $money_transfer = collect(DB::select("SELECT SUM(jml_mata_uang_digital) as total FROM transaction WHERE status_transaksi = 'success' AND id_user = :ID_USER AND metode_pembayaran ='payment'", ["ID_USER" => $user_id]))->first();
        

        $money_income = collect(DB::select("SELECT SUM(jml_mata_uang_digital) as total FROM transaction WHERE status_transaksi = 'success' AND id_user = :ID_USER AND metode_pembayaran ='top up'", ["ID_USER" => $user_id]))->first();
        $res = DB::table('currency')->select('nama_mata_uang')->where(['id' => $currency_mode])->first();
        $nama_mata_uang_convert = "Rp.";

        if($res){
            $nama_mata_uang_convert = $res->nama_mata_uang;
        }

        
        return view('saldo', compact('money_income', 'money_transfer', 'saldo_exchange', 'saldo_rupiah', 'nama_mata_uang_convert'));
    }
}


