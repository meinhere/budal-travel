<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservasiDetail extends Model
{
    use HasFactory;

    protected $table = 'reservasi_detail';
    protected $guarded = ['id'];

    public function wisata() {
        return $this->belongsTo(Wisata::class);
    }

    public function reservasi() {
        return $this->belongsTo(Reservasi::class);
    }
}
