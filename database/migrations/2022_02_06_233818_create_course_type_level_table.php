<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTypeLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_type_level', function (Blueprint $table) {
            $table->foreignId('course_type_id')->constrained();
            $table->foreignId('level_id')->constrained();
        });

        Artisan::call('db:seed', [
            '--class' => 'CourseTypeLevelSeeder',
            '--force' => true
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_type_level');
    }
}
