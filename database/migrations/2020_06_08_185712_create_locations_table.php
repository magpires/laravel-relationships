<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            // Laravel agora tá criando as chaves primárias como bigint. Pra não dar problema com as chaves estrangeiras,
            // vamos especificar o tipo das chaves estrangeiras como biginteger e é GG
            $table->bigInteger('country_id')->unsigned();
            $table->integer('latitude');
            $table->integer('longitude');
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
