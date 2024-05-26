<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservasiDetail extends Model
{
    use HasFactory;

    protected $table = 'reservasi_detail';
    protected $primaryKey = 'kode_reservasi_detail';
    protected $guarded = ['kode_reservasi_detail'];
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $id = (string) ReservasiDetail::count('kode_reservasi_detail') + 1;
            $model->kode_reservasi_detail = "RSD" . str_pad($id, 5, '0', STR_PAD_LEFT);
        });
    }

    public function wisata() {
        return $this->belongsTo(Wisata::class, 'wisata_kode', 'kode_wisata');
    }

    public function reservasi() {
        return $this->belongsTo(Reservasi::class, 'reservasi_kode', 'kode_reservasi');
    }
}
