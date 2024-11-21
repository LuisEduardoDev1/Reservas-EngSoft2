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
        Schema::create('salas', function (Blueprint $table) {
            $table->id('id_sala');
            $table->string('numero', 45);
            $table->integer('quantidade');
            $table->float('tamanho');
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });

        DB::table('salas')->insert([
            [
                'numero' => '101',
                'quantidade' => 20,
                'tamanho' => 30.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'numero' => '102',
                'quantidade' => 35,
                'tamanho' => 45.3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'numero' => '103',
                'quantidade' => 30,
                'tamanho' => 40.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'numero' => '104',
                'quantidade' => 55,
                'tamanho' => 60.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'numero' => '201',
                'quantidade' => 40,
                'tamanho' => 50.7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salas');
    }
};
