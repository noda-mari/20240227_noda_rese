<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopMenu extends Model
{
    use HasFactory;

    protected $fillable = [

        'shop_id',
        'menu_name',
        'price'
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }
}
