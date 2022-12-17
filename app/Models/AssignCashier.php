<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignCashier extends Model
{
    use HasFactory;

    public function cashier(){
        return $this->belongsTo(User::class, 'cashier_id');
    }
    public function route(){
        return $this->belongsTo(Route::class, 'terminal_id');
    }
}
