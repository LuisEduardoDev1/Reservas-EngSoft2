<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaProRei extends Model
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
        'id_reserva_professor',
        'id_sala',
        'data',
        'horario_inicio',
        'horario_fim',
        'descricao',
        'status',
        'id_pro_reitoria'
    ];
}
