<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provinsi extends Model
{
    use HasFactory;

    protected $table = 'provinsi';
    protected $fillable = ['kode_provinsi', 'nama_provinsi'];

    public function kota() {
        return $this->hasMany(Kota::class);
    }
}
