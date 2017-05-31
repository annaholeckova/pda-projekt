<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

	public function works()
	{
		return $this->belongsToMany(Work::class);
	}

	public function skills()
	{
		return $this->belongsToMany(Skill::class);
	}
}
