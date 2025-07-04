<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Decoration extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'price', 'stock', 'image'];
}
