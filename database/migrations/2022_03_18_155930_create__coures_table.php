<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cours', function (Blueprint $table) {
            $table->id(); // pour ajouter une colonne id de type bigint(20) unsigned primary key auto increment.
            $table->string('nom');
            $table->string('photopath')->nullable(); // pour ajouter une colonne de type varchar(255) qui accept des valeurs nulles.
            $table->timestamps(); // pour ajouter 2 colonnes (created_at et updated_at) de type timestamps qui acceptent des valeurs nulles.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cours');
    }
}
