<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservaProf', function (Blueprint $table) {
            $table->id('id_reserva_professor'); // Cria uma coluna auto-incremento
            $table->date('data')->nullable(false);
            $table->unsignedBigInteger('id_sala'); // Supondo que id_sala seja uma referência a outra tabela
            $table->time('horario_inicio')->nullable(false);
            $table->time('horario_fim')->nullable(false);
            $table->string('descricao', 255)->nullable(false);
            $table->enum('status', ['aguardando aprovação', 'aprovado', 'cancelado'])->nullable(false);
            $table->string('primeiro_nome', 255)->nullable(false); 
            $table->integer('id_professor')->nullable(false); 
            $table->string('motivo_cancelamento', 255)->nullable(true);
            $table->timestamps(); // Cria as colunas created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservaProf');
    }
};
