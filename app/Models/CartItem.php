<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['cart_id', 'collection_id', 'customize_id', 'qunatity', 'price', 'total_price'];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    public function customize()
    {
        return $this->belongsTo(Customize::class);
    }
}
