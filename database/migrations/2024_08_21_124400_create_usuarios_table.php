<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {

        // Tabela Publico
        Schema::create('usuario', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('primeiro_nome', 45)->nullable();
            $table->string('sobrenome', 45)->nullable();
            $table->string('nome_proReitoria', 255)->nullable();
            $table->string('universidade', 255)->nullable();
            $table->string('nome_prefeitura', 255)->nullable();
            $table->string('cnpj_prefeitura', 18)->nullable();
            $table->string('cidade', 255)->nullable();
            $table->string('senha', 45);
            $table->string('cpf', 45)->nullable();
            $table->string('email', 45);
            $table->tinyInteger('tipo')->default(1);
            $table->string('remember_token', 100)->nullable();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('prefeitura');
        Schema::dropIfExists('pro_reitoria');
        Schema::dropIfExists('professores');
        Schema::dropIfExists('diretores');
        Schema::dropIfExists('usuario');
    }


};
