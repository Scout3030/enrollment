<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained();
            $table->foreignId('grade_id')->constrained();
            $table->foreignId('bus_stop_id')->nullable()->constrained();
            $table->tinyInteger('bilingual')->default(config('constants.NO'));
            $table->string('previous_school')->nullable();
            $table->string('student_signature')->nullable();
            $table->string('second_tutor_signature')->nullable();
            $table->string('first_tutor_signature')->nullable();
            $table->tinyInteger('repeat_course')->default(config('constants.NO'));
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
        Schema::dropIfExists('enrollments');
    }
}
