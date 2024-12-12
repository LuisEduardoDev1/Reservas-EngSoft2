<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipamentos_reserva extends Model
{
    use HasFactory;

    protected $table = "reservaProRei";
    protected $primaryKey = 'id_reserva_professor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_reserva_equipamento',
        'id_equipamentos',
        'data',
        'horario_inicio',
        'horario_fim',
        'descricao',
        'id_diretor'
    ];
}
