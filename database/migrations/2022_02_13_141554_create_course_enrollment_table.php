<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseEnrollmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_enrollment', function (Blueprint $table) {
            $table->foreignId('course_id')->constrained();
            $table->foreignId('enrollment_id')->constrained();
            $table->tinyInteger('order')->nullable();
        });

        if(config('app.env') == 'local'){
            Artisan::call('db:seed', [
                '--class' => 'EnrollmentSeeder',
                '--force' => true
            ]);
        };
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_enrollment');
    }
}
