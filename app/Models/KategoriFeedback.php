<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriFeedback extends Model
{
    use HasFactory;

    protected $table = 'kategori_feedback';
    protected $primaryKey = 'kode_kategori';
    protected $guarded = ['kode_kategori'];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->kode_kategori = (string) KategoriFeedback::count('kode_kategori') + 1;
        });
    }

    public function feedback() {
        return $this->hasMany(Feedback::class);
    }

}
