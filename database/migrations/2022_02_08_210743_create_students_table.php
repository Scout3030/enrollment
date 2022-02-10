<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('country_id')->nullable()->constrained();
            $table->string('middle_name')->nullable();
            $table->string('paternal_surname')->nullable();
            $table->string('maternal_surname')->nullable();
            $table->string('dni')->nullable();
            $table->date('birth')->nullable();
            $table->string('address')->nullable();
            $table->string('address_number')->nullable();
            $table->string('door')->nullable();
            $table->string('stair')->nullable();
            $table->string('floor')->nullable();
            $table->string('letter')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('first_tutor_dni')->nullable();
            $table->string('first_tutor_full_name')->nullable();
            $table->string('first_tutor_phone_number')->nullable();
            $table->string('first_tutor_email')->nullable();
            $table->string('first_tutor_address')->nullable();
            $table->string('second_tutor_dni')->nullable();
            $table->string('second_tutor_full_name')->nullable();
            $table->string('second_tutor_phone_number')->nullable();
            $table->string('second_tutor_email')->nullable();
            $table->string('second_tutor_address')->nullable();
            $table->boolean('transportation')->nullable();
            $table->string('route')->nullable();
            $table->string('bus_stop')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        if(config('app.env') == 'local'){
            Artisan::call('db:seed', [
                '--class' => 'StudentSeeder',
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
        Schema::dropIfExists('students');
    }
}