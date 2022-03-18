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
        Schema::create('_plannings', function (Blueprint $table) {
            $table->id();
            $table->date('date_seance');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('idCour');
            $table->integer('idSalle');
            $table->integer('idUser');
            $table->foreign('idCour')->references('id')->on('_Coures');
            $table->foreign('idSalle')->references('id')->on('_Salles');
            $table->foreign('idUser')->references('id')->on('_Users');
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
        Schema::dropIfExists('_plannings');
    }
}
