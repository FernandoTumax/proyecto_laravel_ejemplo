<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function employees(){
        return $this->hasMany(Employee::class);
    }

    //Relacion muchos a muchos
    public function campus(){
        return $this->belongsToMany(Campu::class);
    }
}
