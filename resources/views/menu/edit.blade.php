@extends('layouts.app')
@section('content')
<div class="container">
    <div class="header-container">
        <h1 class="page-title">Edit Menu</h1>
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
        <form action="{{ route('menu.update', $menu) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="form-label" for="name">
                    Nama Menu
                </label>
                <input type="text" name="name" id="name" 
                    class="form-input"
                    value="{{ old('name', $menu->name) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="category_id">
                    Kategori
                </label>
                <select name="category_id" id="category_id" 
                        class="form-select"
                        required>
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" 
                                {{ (old('category_id', $menu->category_id) == $category->id) ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label" for="price">
                    Harga
                </label>
                <input type="number" name="price" id="price" 
                    class="form-input"
                    value="{{ old('price', $menu->price) }}" required min="0">
            </div>

            <div class="form-group">
                <label class="form-label" for="description">
                    Deskripsi
                </label>
                <textarea name="description" id="description" rows="3"
                        class="form-input">{{ old('description', $menu->description) }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="submit-button">Simpan Menu</button>
                <a href="{{ route('menu.index') }}" class="cancel-link">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection