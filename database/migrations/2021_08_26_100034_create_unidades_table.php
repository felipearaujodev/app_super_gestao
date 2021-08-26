<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5);//mm, cm, kg
            $table->string('descricao', 50);
            $table->timestamps();
        });

        //adicionando relacionamento com a tabela de produtos
        Schema::table('produtos', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');

            $table->foreign('unidade_id')->references('id')->on('produtos');
        });

        //adicionando relacionamento com a tabela de produtos_detalhes
        Schema::table('produtos_detalhes', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');

            $table->foreign('unidade_id')->references('id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function(Blueprint $table) {
            $table->dropForeign('produtos_unidade_id_foreign');
            $table->dropColumn('unidade_id');
        });

        Schema::table('produtos_detalhes', function(Blueprint $table) {
            $table->dropForeign('produtos_detalhes_unidade_id_foreign');
            $table->dropColumn('unidade_id');
        });

        Schema::dropIfExists('unidades');
    }
}
