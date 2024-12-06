@extends('layouts.app')
@section('content')
<div class="content-container">
    <div class="flex justify-between items-center mb-6">
        <h1 class="page-title">Tambah Menu Baru</h1>
    </div>

    @if($errors->any())
        <div class="error-message">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="order-form">
        <form action="{{ route('menu.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Nama Menu</label>
                <input type="text" name="name" id="name" 
                       class="form-input"
                       value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="category_id" class="form-label">Kategori</label>
                <select name="category_id" id="category_id" class="form-select" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="price" class="form-label">Harga</label>
                <input type="number" name="price" id="price" 
                       class="form-input"
                       value="{{ old('price') }}" required min="0">
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" id="description" rows="3" class="form-input">{{ old('description') }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="submit-button">Simpan Menu</button>
                <a href="{{ route('menu.index') }}" class="cancel-link">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
