<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function job(){
        return $this->belongsTo(JobTitle::class);
    }

    public function getAgeAttribute()
	{
		$years = Carbon::parse($this->date_birth)->age;
	    return $years;
	}

}
