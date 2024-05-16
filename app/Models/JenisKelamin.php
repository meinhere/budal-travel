<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKelamin extends Model
{
    use HasFactory;

    protected $table = 'jenis_kelamin'; 
    protected $guarded = ['kode_jenis_kelamin'];

    public static function boot() {
        parent::boot();

        static::creating(function($jenisKelamin) {
            $jenisKelamin->kode_jenis_kelamin = (string) JenisKelamin::count() + 1;
        });
    }

    public function pelanggan() {
        return $this->hasMany(Pelanggan::class);
    }
}
