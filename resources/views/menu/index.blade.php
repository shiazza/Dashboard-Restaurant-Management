@extends('layouts.app')
@section('content')
<div class="content-container">
    <div class="header-section">
        <div class="header-section-text">
            <h1 class="page-title">Daftar Menu</h1>
            <h2 class="page-description">Halo {{ Auth::user()?->username ?? 'Guest' }}, Ingin tambah menu apa?</h2>
        </div>
        <a href="{{ route('menu.create') }}" class="add-button">Tambah Menu</a>
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
                    <th>Nama Menu</th>
                    <th>Kategori</th>
                    <th class="text-right">Harga</th>
                    <th>Deskripsi</th>
                    <th class="action-cell">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $menu)
                <tr>
                    <td>{{ $menu->name }}</td>
                    <td>{{ $menu->category->category_name }}</td>
                    <td>Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
                    <td>{{ $menu->description }}</td>
                    <td class="action-cell">
                        <a href="{{ route('menu.edit', $menu) }}" class="detail-link">
                            <img src="{{('/icon/edit.svg')}}" alt="edit">
                            Edit</a>
                        <form action="{{ route('menu.destroy', $menu) }}" method="POST" class="inline-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button" 
                                    onclick="return confirm('Yakin ingin menghapus menu ini?')">
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
