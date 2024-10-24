<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaProf extends Model
{
    use HasFactory;

    protected $table = "reservaProf";
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
        'id_professor'
    ];
}
