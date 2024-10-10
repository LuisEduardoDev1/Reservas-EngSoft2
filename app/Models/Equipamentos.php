<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Equipamentos extends Model
{
    use HasFactory;
    use HasFactory, Notifiable;

    protected $table = "equipamentos";
    protected $primaryKey = 'id_equipamentos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_equipamentos',
        'nome',
        'quantidade',
        'marca',
        'descricao'
    ];


}