@extends('layouts.app')

@section('content')
<h2>Dashboard</h2>
<div class="text-dashboard">
  <h2>Balance</h2>
</div>
<div class="dashboard-items">
  <div class="saldo-user">
      <h2>Your Last Balance<br /><span>Rp. {{$saldo_rupiah->saldo ?? 0}}</span></h2>
  </div>
  <div class="transfer-uang">
      <h2>Total Money Transfer<br /><span>Rp. {{$money_transfer->total ?? 0}}</span></h2>
  </div>
</div>
<div class="dashboard-items2">
  <div class="total-pendapatan">
      <h2>Total Money Income<br /><span>Rp. {{$money_income->total ?? 0}}</span></h2>
  </div>
  <div class="penukaran-uang">
      <h2>
          Your Currency After Exchange<br /><span
              >{{$nama_mata_uang_convert}} {{$saldo_exchange->saldo ?? 0}}
          </span>
      </h2>
  </div>
</div>
<section id="svg-path">
  <section id="card"></section>
</section>
@endsection