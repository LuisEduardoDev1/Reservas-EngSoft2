<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
        
        DB::table('usuario')->insert([
            [
                'primeiro_nome' => 'PROFESSOR',
                'sobrenome' => 'UESPI',
                'senha' => '1111',
                'cpf' => '123.456.789-00',
                'email' => 'professor@uespi.br',
                'tipo' => 2,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'nome_proReitoria' => null,  // Campos não obrigatórios podem ser nulos
                'universidade' => null,
                'nome_prefeitura' => null,
                'cnpj_prefeitura' => null,
                'cidade' => null,
            ],
            [
                'primeiro_nome' => 'DIRETOR',
                'sobrenome' => 'UESPI',
                'senha' => '1111',
                'cpf' => '123.456.789-00',
                'email' => 'diretor@uespi.br',
                'tipo' => 3,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'nome_proReitoria' => null,
                'universidade' => null,
                'nome_prefeitura' => null,
                'cnpj_prefeitura' => null,
                'cidade' => null,
            ],
            [
                'primeiro_nome' => null,  // Se não for aplicável, pode deixar como null
                'sobrenome' => null,
                'senha' => '1111',
                'cpf' => null,  // Campo CPF é opcional nesse caso
                'email' => 'prefeitura@teresina.com',
                'tipo' => 5,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'nome_proReitoria' => null,
                'universidade' => null,
                'nome_prefeitura' => 'Prefeitura',
                'cnpj_prefeitura' => '11111111111111',
                'cidade' => 'TERESINA',
            ],
            [
                'primeiro_nome' => null,
                'sobrenome' => null,
                'senha' => '1111',
                'cpf' => null,
                'email' => 'prop@uespi.br',
                'tipo' => 4,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'nome_proReitoria' => 'PROP',
                'universidade' => 'UESPI',
                'nome_prefeitura' => null,
                'cnpj_prefeitura' => null,
                'cidade' => null,
            ],
        ]);
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
