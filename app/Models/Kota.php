<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kota extends Model
{
    use HasFactory;

    protected $table = 'kota';
    protected $primaryKey = 'kode_kota';
    protected $foreignKey = 'provinsi_kode';
    protected $fillable = ['kode_kota', 'provinsi_kode', 'nama_kota'];
    public $timestamps = false;

    public function provinsi() {
        return $this->belongsTo(Provinsi::class, 'provinsi_kode', 'kode_provinsi');
    }

    public function wisata() {
        return $this->hasMany(Wisata::class);
    }
}