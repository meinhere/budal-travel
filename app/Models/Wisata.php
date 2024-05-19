<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;
    
    protected $table = 'wisata';
    protected $primaryKey = 'kode_wisata';
    protected $guarded = ['kode_wisata'];
    public $timestamps = false;
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $kode = (string) Wisata::count('kode_wisata') + 1;
            $model->kode_wisata = "WIS" . str_pad($kode, 5, '0', STR_PAD_LEFT);
        });
    }

    public function kota() {
        return $this->belongsTo(Kota::class, 'kota_kode', 'kode_kota');
    }

    public function reservasi_detail() {
        return $this->hasMany(ReservasiDetail::class, 'kode_wisata', 'kode_wisata');
    }
}
