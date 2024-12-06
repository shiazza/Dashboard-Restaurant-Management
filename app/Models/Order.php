<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Tentukan tabel jika namanya berbeda dari default
    protected $table = 'orders';

    // Kolom yang bisa diisi
    protected $fillable = ['customer_name', 'total_price', 'order_date'];

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id'); // Gunakan 'order_id' sebagai foreign key
    }

    // Relasi ke OrderItem (satu pesanan bisa punya banyak item)
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}