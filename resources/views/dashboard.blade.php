@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Dashboard</h1>
    @if (Auth::check())
    <h2>Halo {{ Auth::user()?->username ?? 'Guest' }}, berikut laporan restoran hari ini</h2>
    @else
    <h2>Selamat datang, {{ Auth::user()?->name ?? 'Guest' }} silahkan login untuk mengakses lebih banyak</h2>
    @endif
    <div class="dashboard-cards">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Pegawai</h5>
                <p class="card-text">{{ $userCount }}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Kategori</h5>
                <p class="card-text">{{ $categoryCount }}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Menu</h5>
                <p class="card-text">{{ $menuCount }}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Orderan</h5>
                <p class="card-text">{{ $orderCount }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
