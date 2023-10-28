<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helper\APIExchange;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment');
    }

    public function submit_payment(Request $request)
    {
        $jumlah_payment = $request->input('jumlah_payment');

        $user_id = session()->get('id');

        $res_saldo = DB::table('balance')->select(['saldo'])->where(['id_user' => $user_id, 'id_currency' => 1])->first();
        $saldo_user_idr = $res_saldo->saldo;

        if($jumlah_payment > $saldo_user_idr){
            return response()->json(['error' => "Maaf, uang yang di payment melebihi saldo IDR mu"], 422);
        }

        $saldo_idr_after_payment = $saldo_user_idr - $jumlah_payment;
        DB::table('balance')->update(['saldo' => $saldo_idr_after_payment])->where(['id_user' => $user_id, 'id_currency' => 1]);
        DB::table('transaction')->insert([
            'id_user' => $user_id,
            'tanggal' => date('Y-m-d'),
            'jml_mata_uang_digital' => $jumlah_payment,
            'metode_pembayaran' => 'payment',
            'status' => 'success'
        ]);

        return response()->json(['success' => true], 200);
    }
}


