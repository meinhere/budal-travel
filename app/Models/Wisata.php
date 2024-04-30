<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;
    
    protected $table = 'wisata';
    protected $guarded = ['id'];

    public function kota() {
        return $this->belongsTo(Kota::class);
    }

    public function reservasi_detail() {
        return $this->hasMany(ReservasiDetail::class);
    }
}
