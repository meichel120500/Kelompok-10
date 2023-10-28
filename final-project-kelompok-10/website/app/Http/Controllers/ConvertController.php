<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helper\APIExchange;

class ConvertController extends Controller
{
    public function index()
    {
        $currency_mode = session()->get('currency_mode');

        $currency_convert = DB::table('currency')->select(['nama_mata_uang', 'kode_mata_uang'])->where(['id' => $currency_mode])->first();

        $kode_mata_uang_convert = $currency_convert->kode_mata_uang;
        
        $convert_rate_idr = $this->_get_conversion_rate_idr($kode_mata_uang_convert);

        return view('convert', compact('convert_rate_idr', 'currency_convert'));
    }

    public function submit_convert(Request $request)
    {
        $jumlah_convert = $request->input('jumlah_convert');

        $user_id = session()->get('id');
        $currency_mode = session()->get('currency_mode');

        $currency_convert = DB::table('currency')->select(['nama_mata_uang', 'kode_mata_uang'])->where(['id' => $currency_mode])->first();

        $kode_mata_uang_convert = $currency_convert->kode_mata_uang;
        
        $convert_rate_idr = $this->_get_conversion_rate_idr($kode_mata_uang_convert);

        $jumlah_idr = $convert_rate_idr * $jumlah_convert;

        $res_saldo = DB::table('balance')->select(['saldo'])->where(['id_user' => $user_id, 'id_currency' => 1])->first();
        $saldo_user_idr = $res_saldo->saldo;

        if($jumlah_idr > $saldo_user_idr){
            return response()->json(['error' => "Maaf, uang yang di convert melebihi saldo IDR mu"], 422);
        }

        $saldo_idr_after_conversion = $saldo_user_idr - $jumlah_idr;
        DB::table('balance')->update(['saldo' => $saldo_idr_after_conversion])->where(['id_user' => $user_id, 'id_currency' => 1]);
        DB::table('transaction')->insert([
            'id_user' => $user_id,
            'tanggal' => date('Y-m-d'),
            'jml_mata_uang_digital' => $jumlah_convert,
            'metode_pembayaran' => 'convert',
            'nama_mata_uang' => $currency_convert->nama_mata_uang,
            'status' => 'success'
        ]);

        return response()->json(['success' => true], 200);
    }

    private function _get_conversion_rate_idr($kode_mata_uang_convert)
    {
        $base_eur_in_idr = APIExchange::get('latest', ['symbols' => 'IDR']);
        $base_eur_in_convert = APIExchange::get('latest', ['symbols' => $kode_mata_uang_convert]);
        $convert_rate_idr = $base_eur_in_idr / $base_eur_in_convert;
        return $convert_rate_idr;
    }
}


