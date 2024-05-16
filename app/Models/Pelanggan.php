<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pelanggan extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'pelanggan';
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
