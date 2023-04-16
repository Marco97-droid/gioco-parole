<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('user_id')->nullable();

            $table->integer('tre_lettere_punti')->default(0);
            $table->integer('quattro_lettere_punti')->default(0);
            $table->integer('cinque_lettere_punti')->default(0);
            $table->integer('sei_lettere_punti')->default(0);

            $table->integer('tre_lettere_indovinate')->default(0);
            $table->integer('quattro_lettere_indovinate')->default(0);
            $table->integer('cinque_lettere_indovinate')->default(0);
            $table->integer('sei_lettere_indovinate')->default(0);

            $table->integer('tre_lettere_sbagliate')->default(0);
            $table->integer('quattro_lettere_sbagliate')->default(0);
            $table->integer('cinque_lettere_sbagliate')->default(0);
            $table->integer('sei_lettere_sbagliate')->default(0);

            $table->integer('tre_lettere_partite_giocate')->default(0);
            $table->integer('quattro_lettere_partite_giocate')->default(0);
            $table->integer('cinque_lettere_partite_giocate')->default(0);
            $table->integer('sei_lettere_partite_giocate')->default(0);
            

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stats');
    }
};
