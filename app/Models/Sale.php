<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    public function driver(){
        return $this->belongsTo(User::class, 'driver_id');
    }
    public function cashier(){
        return $this->belongsTo(User::class, 'cashier_id');
    }
    public function route(){
        return $this->belongsTo(Route::class, 'terminal_id');
    }
}
