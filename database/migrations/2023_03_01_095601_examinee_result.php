<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExamineeResult extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examinee_result', function (Blueprint $table) {
            $table->id();
            $table->integer('admission_id');
            $table->integer('row_score')->length(5);
            $table->integer('percentile')->length(5);
            $table->string('rating');
            $table->string('interviewd_by');
            $table->string('approval');
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
         Schema::dropIfExists('examinee_result');
    }
}
