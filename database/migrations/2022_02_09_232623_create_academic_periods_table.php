<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_periods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('level_id')->constrained();
            $table->text('description')->nullable();
            $table->tinyInteger('status');
            $table->dateTime('started_at');
            $table->dateTime('finished_at');
            $table->timestamps();
        });

        if(config('app.env') == 'local'){
            Artisan::call('db:seed', [
                '--class' => 'AcademicPeriodSeeder',
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
        Schema::dropIfExists('academic_periods');
    }
}
