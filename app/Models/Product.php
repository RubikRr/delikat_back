<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $product)
 */
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='products';
    protected $guarded=[];
//    protected $hidden = [
//        'deleted_at',
//        'created_at',
//        'updated_at',
//    ];
}
