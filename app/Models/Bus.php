<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    
    protected $table = 'bus';
    protected $primaryKey = 'kode_bus';
    protected $guarded = ['kode_bus'];
    public $timestamps = false;
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $id = (string) Bus::count('kode_bus') + 1;
            $model->kode_bus = "B" . str_pad($id, 3, '0', STR_PAD_LEFT);
        });
    }

    public function kategori_bus() {
        return $this->belongsTo(KategoriBus::class, 'kategori_kode', 'kode_kategori');
    }

    public function status_bus() {
        return $this->belongsTo(StatusBus::class, 'status_bus_kode', 'kode_status');
    }

    public function reservasi() {
        return $this->hasMany(Reservasi::class, 'bus_kode', 'kode_bus');
    }
}
