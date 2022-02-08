<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grade_id')->constrained();
            $table->string('name');
            $table->text('description');
            $table->tinyInteger('type');
            $table->timestamps();
            $table->softDeletes();
        });

        if(config('app.env') == 'local'){
            Artisan::call('db:seed', [
                '--class' => 'CourseSeeder',
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
        Schema::dropIfExists('courses');
    }
}
