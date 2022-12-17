<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignDriver extends Model
{
    use HasFactory;

    public function driver(){
        return $this->belongsTo(User::class, 'driver_id');
    }
    public function bus(){
        return $this->belongsTo(Bus::class, 'bus_id');
    }
}
