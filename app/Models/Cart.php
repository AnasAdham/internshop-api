<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id' ,
        'item_name' ,
        'item_quantity' ,
        'item_price' ,
        'user_id' ,
    ];
}
