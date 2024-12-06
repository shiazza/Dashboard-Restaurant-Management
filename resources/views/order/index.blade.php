@extends('layouts.app')
@section('content')
<div class="content-container">
    <div class="header-section">
        <div class="header-section-text">
            <h1 class="page-title">Daftar Orderan</h1>
            <h2 class="page-description">Halo {{ Auth::user()?->username ?? 'Guest' }}, Siapa saja yang ingin order?</h2>
        </div>
        <a href="{{ route('order.create') }}" class="add-button">
            Tambah Pesanan
        </a>
    </div>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-wrapper">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Tanggal</th>
                    <th class="text-right">Total</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order as $item)
                <tr>
                    <td>{{ $item->customer_name }}</td>
                    <td>{{ $item->order_date }}</td>
                    <td>Rp {{ number_format($item->total_price) }}</td>
                    <td class="action-cell">
                        <a href="{{ route('order.show', $item) }}" class="detail-link">
                            <img src="{{('/icon/note.svg')}}" alt="detail">
                            Detail
                        </a>
                        <form action="{{ route('order.destroy', $item) }}" method="POST" class="inline-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button" 
                                    onclick="return confirm('Yakin ingin menghapus?')">
                                    <img src="{{('/icon/trash.svg')}}" alt="delete">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection