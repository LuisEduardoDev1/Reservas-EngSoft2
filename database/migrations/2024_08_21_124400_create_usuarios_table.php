<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()    {
        // Tabela Prefeitura
        Schema::create('prefeitura', function (Blueprint $table) {
            $table->id('id_prefeitura');
            $table->string('nome_prefeitura', 255);
            $table->string('cnpj_prefeitura', 18)->unique();
            $table->string('cidade', 255);
            $table->string('telefone', 15)->nullable();
            $table->tinyInteger('tipo')->default(5); // Tipo 5 para Prefeitura
            $table->string('email', 100)->nullable();
            $table->string('senha', 45);
            $table->string('remember_token', 100)->nullable();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });

        // Tabela Pro-Reitoria
        Schema::create('pro_reitoria', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255);
            $table->string('universidade', 255);
            $table->tinyInteger('tipo')->default(4); // Tipo 4 para Pro-Reitoria
            $table->string('email', 100)->nullable();
            $table->string('senha', 45);
            $table->string('telefone', 15)->nullable();
            $table->string('endereco', 255)->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });

        // Tabela Professores
        Schema::create('professores', function (Blueprint $table) {
            $table->id('id_professor');
            $table->string('primeiro_nome', 45);
            $table->string('sobrenome', 45);
            $table->string('senha', 45);
            $table->string('cpf', 45);
            $table->string('email', 45);
            $table->tinyInteger('tipo')->default(2); // Tipo 2 para Professores
            $table->string('remember_token', 100)->nullable();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });

        // Tabela Diretores
        Schema::create('diretores', function (Blueprint $table) {
            $table->id('id_diretor');
            $table->string('primeiro_nome', 45);
            $table->string('sobrenome', 45);
            $table->string('senha', 45);
            $table->string('cpf', 45);
            $table->string('email', 45);
            $table->tinyInteger('tipo')->default(3); // Tipo 3 para Diretores
            $table->string('remember_token', 100)->nullable();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });

        // Tabela Publico
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('primeiro_nome', 45);
            $table->string('sobrenome', 45);
            $table->string('senha', 45);
            $table->string('cpf', 45);
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
        Schema::dropIfExists('publico');
    }


};
