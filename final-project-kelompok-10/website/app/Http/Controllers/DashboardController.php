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
        $currency_mode = session()->get('currency_mode');

        $saldo_rupiah = DB::table('balance')
            ->select('saldo')
            ->where(['id_user' => $user_id, 'id_currency' => $id_rupiah])
            ->first();

        $saldo_exchange = DB::table('balance')
            ->select('saldo')
            ->where(['id_user' => $user_id, 'id_currency' => $currency_mode])
            ->first();

        return view('dashboard', compact('saldo_rupiah', 'saldo_exchange'));
    }
}


