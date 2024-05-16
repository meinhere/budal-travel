<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    
    protected $table = 'karyawan';
    protected $primaryKey = 'id_karyawan';
    protected $guarded = ['id_karyawan'];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $id = (string) Karyawan::count('id_karyawan') + 1;
            $model->id_karyawan = "K" . str_pad($id, 3, '0', STR_PAD_LEFT);
        });
    }

    public function login() {
        return $this->belongsTo(Login::class);
    }
    
    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function jenis_kelamin() {
        return $this->belongsTo(JenisKelamin::class);
    }
}
