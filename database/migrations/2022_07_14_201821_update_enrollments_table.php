<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->string('certificate_document', 500)->change();
            $table->string('agreement_document', 500)->change();
            $table->string('dni_document', 500)->change();
            $table->string('payment_document', 500)->change();
            $table->string('academic_history', 500)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->string('certificate_document', 255)->change();
            $table->string('agreement_document', 255)->change();
            $table->string('dni_document', 255)->change();
            $table->string('payment_document', 255)->change();
            $table->string('academic_history', 255)->change();
        });
    }
}
