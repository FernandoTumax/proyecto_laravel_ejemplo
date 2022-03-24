<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campu extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function state(){
        return $this->belongsTo(State::class);
    }

    public function town(){
        return $this->belongsTo(Town::class);
    }

    public function jobs(){
        return $this->belongsToMany(JobTitle::class);
    }
}
