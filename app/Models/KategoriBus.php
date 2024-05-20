<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBus extends Model
{
    use HasFactory;
    
    protected $table = 'kategori_bus';
    protected $primaryKey = 'kode_kategori';
    protected $guarded = ['kode_kategori'];
    public $timestamps = false;
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $id = (string) KategoriBus::count('kode_kategori') + 1;
            $model->kode_kategori = "KB" . str_pad($id, 2, '0', STR_PAD_LEFT);
        });
    }

    public function bus() {
        return $this->hasMany(Bus::class, 'kategori_kode', 'kode_kategori');
    }
}
