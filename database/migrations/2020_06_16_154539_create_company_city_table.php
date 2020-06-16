<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // O Laravel espera que tabelas pivor recebam nomes em ordem alfabética. Se isso não acontecer, um erro será gerado
        // A tabela pivor abaixo deveria se chamar "city_company"
        Schema::create('company_city_', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('city_id')->unsigned();
            $table->bigInteger('company_id')->unsigned();

            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_city');
    }
}
