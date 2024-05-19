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
    public $timestamps = false;
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $id = (string) Karyawan::count('id_karyawan') + 1;
            $model->id_karyawan = "K" . str_pad($id, 3, '0', STR_PAD_LEFT);
        });
    }

    public function login() {
        return $this->belongsTo(Login::class, 'karyawan_id', 'id_karyawan');
    }
    
    public function role() {
        return $this->belongsTo(Role::class, 'role_id', 'id_role');
    }

    public function jenis_kelamin() {
        return $this->belongsTo(JenisKelamin::class, 'jenis_kelamin_kode', 'kode_jenis_kelamin');
    }
}
