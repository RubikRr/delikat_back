<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $customer)
 */
class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="customers";
    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];
    protected $guarded=[];

}
