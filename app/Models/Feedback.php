<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';
    protected $guarded = ['kode_feedback'];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $id = (string) Feedback::count('kode_feedback') + 1;
            $model->kode_feedback = "FB" . str_pad($id, 6, '0', STR_PAD_LEFT);
        });
    }

    public function kategoriFeedback() {
        return $this->belongsTo(KategoriFeedback::class);
    }

    public function reservasi() {
        return $this->belongsTo(Reservasi::class);
    }
}
