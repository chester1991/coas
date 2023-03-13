<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Applicant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_admission', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->integer('admission_id')->length(11);
            $table->enum('status', array(1, 2, 3, 4))->default(1);
            $table->string('campus');
            $table->string('lname');
            $table->string('fname');
            $table->string('mname');
            $table->string('ext');
            $table->string('gender');
            $table->string('address');
            $table->string('bday');
            $table->string('contact');
            $table->string('email');
            $table->string('lstsch_attended');
            $table->string('strand');
            $table->string('suc_lst_attended');
            $table->string('course');
            $table->string('preference_1');
            $table->string('preference_2');
            $table->string('d_admission');
            $table->string('time');
            $table->string('venue');
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
        Schema::dropIfExists('applicant_admission');
    }
}
