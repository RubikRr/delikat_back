<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $customer)
 */
class Customer extends Model
{
    use HasFactory;

    protected $table="customers";

    protected $guarded=[];

}
