@extends('layouts.app')
@section('content')
<div class="content-container">
    <h1 class="page-title">Buat Pesanan Baru</h1>

    @if($errors->any())
        <div class="error-message">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('order.store') }}" method="POST" class="order-form">
        @csrf
        <div class="form-group">
            <label class="form-label" for="customer_name">
                Nama Customer
            </label>
            <input type="text" name="customer_name" id="customer_name" 
                class="form-input"
                value="{{ old('customer_name') }}" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="order_date">
                Tanggal Pesanan
            </label>
            <input type="date" name="order_date" id="order_date" 
                   class="form-input"
                   value="{{ old('order_date', date('Y-m-d')) }}" required>
        </div>

        <div id="menu-items">
            <div class="form-group menu-item" data-index="0">
                <div class="menu-row">
                    <div class="menu-select-wrapper">
                        <label class="form-label">Menu</label>
                        <select name="menu_items[0][menu_id]" class="form-select" required>
                            <option value="">Pilih Menu</option>
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->name }} - Rp {{ number_format($menu->price) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="quantity-wrapper">
                        <label class="form-label">Jumlah</label>
                        <input type="number" name="menu_items[0][quantity]" min="1" value="1"
                               class="form-input" required>
                    </div>
                    <div class="menu-action-wrapper">
                        <button type="button" class="delete-menu-button" style="display: none;">
                            <img src="{{('/icon/trash_gray.svg')}}" alt="delete">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="button" id="add-menu" class="add-menu-button">
                + Tambah Menu
            </button>
        </div>

        <div class="form-actions">
            <button type="submit" class="submit-button">
                Simpan Pesanan
            </button>
            <a href="{{ route('order.index') }}" class="cancel-link">
                Batal
            </a>
        </div>
    </form>
</div>

<script>
let menuIndex = 1;

// Fungsi untuk mengatur visibilitas tombol hapus
function updateDeleteButtons() {
    const menuItems = document.querySelectorAll('.menu-item');
    menuItems.forEach((item, index) => {
        const deleteButton = item.querySelector('.delete-menu-button');
        if (menuItems.length > 1) {
            deleteButton.style.display = 'block';
        } else {
            deleteButton.style.display = 'none';
        }
    });
}

// Tambah menu baru
document.getElementById('add-menu').addEventListener('click', function() {
    const menuItems = document.getElementById('menu-items');
    const newItem = document.querySelector('.menu-item').cloneNode(true);
    
    const select = newItem.querySelector('select');
    const input = newItem.querySelector('input[type="number"]');
    const deleteButton = newItem.querySelector('.delete-menu-button');
    
    select.name = `menu_items[${menuIndex}][menu_id]`;
    input.name = `menu_items[${menuIndex}][quantity]`;
    
    select.value = '';
    input.value = 1;
    
    newItem.dataset.index = menuIndex;
    
    menuItems.appendChild(newItem);
    menuIndex++;
    
    // Tambahkan event listener untuk tombol hapus
    deleteButton.addEventListener('click', function() {
        newItem.remove();
        updateDeleteButtons();
    });
    
    updateDeleteButtons();
});

// Inisialisasi tombol hapus untuk menu pertama
document.querySelector('.delete-menu-button').addEventListener('click', function() {
    const menuItem = this.closest('.menu-item');
    menuItem.remove();
    updateDeleteButtons();
});

// Inisialisasi visibilitas tombol hapus
updateDeleteButtons();
</script>
@endsection