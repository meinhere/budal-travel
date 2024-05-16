<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $guarded = ['kode_pelanggan'];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $id = (string) Pelanggan::count('id_pelanggan') + 1;
            $model->id_pelanggan = "P" . str_pad($id, 3, '0', STR_PAD_LEFT);
        });
    }

    public function login() {
        return $this->belongsTo(Login::class);
    }

    public function jenis_kelamin() {
        return $this->belongsTo(JenisKelamin::class);
    }
}
