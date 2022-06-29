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
            $table->foreignId('academic_period_id')->constrained();
            $table->foreignId('bus_stop_id')->nullable()->constrained();
            $table->tinyInteger('bilingual')->nullable();
            $table->string('previous_school')->nullable();
            $table->string('student_signature')->nullable();
            $table->string('second_tutor_signature')->nullable();
            $table->string('first_tutor_signature')->nullable();
            $table->tinyInteger('repeat_course')->default(config('constants.NO'));
            $table->string('certificate_document')->nullable();
            $table->string('agreement_document')->nullable();
            $table->string('dni_document')->nullable();
            $table->string('payment_document')->nullable();
            $table->string('academic_history')->nullable();
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
