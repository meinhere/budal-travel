<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusBus extends Model
{
    use HasFactory;

    protected $table = 'status_bus';
    protected $guarded = ['id'];

    public function bus() {
        return $this->hasMany(Bus::class);
    }
}
