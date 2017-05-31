<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $guarded = [];

	public function students()
	{
		return $this->belongsToMany(Student::class);
    }

    public function work_category() {
		return $this->belongsTo(WorkCategory::class);
	}
}
