<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $table='order_products';
    protected $primaryKey = ['order_id', 'product_id'];
    protected $guarded=[];
    protected $hidden = [
        'updated_at',
        'created_at',
    ];
    public $incrementing = false;
}
