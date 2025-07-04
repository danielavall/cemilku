<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayerSnack extends Model
{
    public function snack(){
        return $this->belongsTo(Snack::class, 'id_snack', 'id');
    }
}
