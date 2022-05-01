<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plannings', function (Blueprint $table) {
            $table->id();
            $table->date('date_seance');
            $table->time('start_time');
            $table->time('end_time');
            $table->unsignedBigInteger('idCour');
            $table->unsignedBigInteger('idSalle');
            $table->unsignedBigInteger('idUser');
            $table->foreign('idCour')->references('id')->on('Cour');
            $table->foreign('idSalle')->references('id')->on('Salles');
            $table->foreign('idUser')->references('id')->on('Users');
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
        Schema::dropIfExists('plannings');
    }
}
