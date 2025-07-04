<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'label',
        'provinsi',
        'kota_kabupaten',
        'kecamatan',
        'kelurahan_desa',
        'rt',
        'rw',
        'kode_pos',
        'address',
        'is_primary',
        'receiver_name',
        'phone_num'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
