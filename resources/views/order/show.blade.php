@extends('layouts.app')
@section('content')
<style>
    body{
        margin: 80px auto;
        padding: 15px 0rem 0rem 12rem;
    }
</style>
<div class="container-top">
    <div class="container">
        <div class="header-section">
            <h1 class="page-title">Detail Pesanan</h1>
            <a href="{{ route('order.index') }}" class="back-link">
                Kembali ke Daftar
            </a>
        </div>
    
    
        <div class="order-card">
            <div class="order-info">
                <h2 class="section-title">Informasi Pesanan</h2>
                <p class="info-text"><span class="info-label">Customer:</span> {{ $order->customer_name }}</p>
                <p class="info-text"><span class="info-label">Tanggal:</span> {{ $order->order_date }}</p>
                <p class="info-text"><span class="info-label">Total:</span> Rp {{ number_format($order->total_price) }}</p>
            </div>
    
            <div>
                <h2 class="section-title">Detail Menu</h2>
                <table class="order-table">
                    <thead class="table-header">
                        <tr>
                            <th>Menu</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="table-body">
                        @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->menu->name }}</td>
                            <td>Rp {{ number_format($item->price) }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>Rp {{ number_format($item->subtotal) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="table-footer">
                        <tr>
                            <td colspan="3" class="total-label">Total:</td>
                            <td class="total-amount">Rp {{ number_format($order->total_price) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    </div>