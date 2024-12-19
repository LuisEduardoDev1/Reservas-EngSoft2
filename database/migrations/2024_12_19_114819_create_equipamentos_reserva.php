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
        Schema::create('equipamentos_reserva', function (Blueprint $table) {
            $table->id('id_reserva_equipamento'); 
            $table->date('data')->nullable(false);
            $table->unsignedBigInteger('id_equipamentos'); 
            $table->time('horario_inicio')->nullable(false);
            $table->time('horario_fim')->nullable(false);
            $table->string('descricao', 255)->nullable(false);
            $table->unsignedBigInteger('id_professor'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipamentos_reserva');
    }
};
