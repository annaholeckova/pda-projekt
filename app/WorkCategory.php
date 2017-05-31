<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkCategory extends Model
{
    protected $guarded = [];

	public function works()
	{
		return $this->hasMany(Work::class);
    }
}
