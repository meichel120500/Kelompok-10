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

        
        $bank = DB::table('data_transaksi_bank')
            ->where('user_id', $user_id)
            ->first();

        if (!$bank) {
            return redirect()->route('dashboard')->with("error", 'Data Bank tidak ditemukan!');
        }

        $bank_id = $bank->id;

        $data_transaksi = DB::table('histori_transaksi')
            ->select('id as id_transaksi', 'tanggal_transaksi', 'jenis_transaksi', 'jumlah_transaksi')
            ->where('bank_id', $bank_id)
            ->orderBy('tanggal_transaksi', 'desc')
            ->get();

        
        $total_transfer = 0;
        $total_pendapatan = 0;
        foreach($data_transaksi as $d){
            if($d->jenis_transaksi == "transfer"){
                $total_transfer += $d->jumlah_transaksi;
            }
            if($d->jenis_transaksi == "pendapatan"){
                $total_pendapatan += $d->jumlah_transaksi;
            }
        }

        return view('saldo', compact('total_transfer', 'total_pendapatan', 'bank'));
    }
}


