<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    public function towns(){
        return $this->hasMany(Town::class);
    }

    public function campus(){
        return $this->hasMany(Campu::class);
    }
}
