<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusReservasi extends Model
{
    use HasFactory;

    protected $table = 'status_reservasi';
    protected $primaryKey = 'kode_status';
    protected $guarded = ['kode_status'];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->kode_status = (string) StatusReservasi::count('kode_status') + 1;
        });
    }

    public function reservasi() {
        return $this->hasMany(Reservasi::class);
    }
}
