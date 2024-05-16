<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role';
    protected $guarded = ['id_role'];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->id_role = (string) Role::count('id_role') + 1;
        });
    }

    public function karyawan() {
        return $this->hasMany(Karyawan::class);
    }
}
