<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableApplicantDocs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_docs', function (Blueprint $table) {
            $table->id();
            $table->integer('admission_id');
            $table->string('r_card');
            $table->string('g_moral');
            $table->string('t_record');
            $table->string('b_cert');
            $table->string('h_dismissal');
            $table->string('m_cert');
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
        Schema::dropIfExists('applicant_docs');
    }
}
