<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(App\WorkCategory::class, 5)->create();
        factory(App\Work::class, 5)->create();
		factory(App\Skill::class, 5)->create();
		factory(App\Student::class, 5)->create( );
    }
}
