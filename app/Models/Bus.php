<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    
    protected $table = 'bus';
    protected $guarded = ['kode_bus'];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $id = (string) Bus::count('kode_bus') + 1;
            $model->id_bus = "B" . str_pad($id, 3, '0', STR_PAD_LEFT);
        });
    }

    public function kategori() {
        return $this->belongsTo(KategoriBus::class);
    }

    public function status_bus() {
        return $this->belongsTo(StatusBus::class);
    }

    public function reservasi() {
        return $this->hasMany(Reservasi::class);
    }
}
