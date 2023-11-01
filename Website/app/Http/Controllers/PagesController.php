<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    Public function index()
    {
        return view('pages.index');
    }

    Public function Cek_Saldo()
    {
        return view('pages.Cek_Saldo');
    }

    Public function Profile()
    {
        return view('pages.Profile');
    }

    Public function Log_Out()
    {
        return view('pages.Log_Out');
    }
}
