<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
			$table->text('description');
			$table->text('employer');
			$table->double('pay');
			$table->timestamp('starts_at');
			$table->timestamp('ends_at')->nullable();
			$table->integer('work_category_id');
			$table->integer('agency_id');
			$table->double('agency_provision');
			$table->boolean('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
}
