<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasi';
    protected $guarded = ['id'];

    public function reservasi_detail() {
        return $this->hasMany(ReservasiDetail::class);
    }

    public function karyawan() {
        return $this->belongsTo(Karyawan::class);
    }

    public function bus() {
        return $this->belongsTo(Bus::class);
    }

    public function pelanggan() {
        return $this->belongsTo(Pelanggan::class);
    }
}
