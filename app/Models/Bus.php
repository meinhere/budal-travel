<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    
    protected $table = 'bus';
    protected $guarded = ['id'];

    public function kategori() {
        return $this->belongsTo(Kategori::class);
    }

    public function status_bus() {
        return $this->belongsTo(StatusBus::class);
    }

    public function reservasi() {
        return $this->hasMany(Reservasi::class);
    }
}
