<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Prefeitura extends Model
{
    Use HasFactory;

    use HasFactory;
    use HasFactory, Notifiable;

    protected $table = "prefeitura";
    protected $primaryKey = 'id_prefeitura';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_prefeitura',
        'nome_prefeitura',
        'cnpj_prefeitura',
        'cidade',
        'telefone',
        'email',
        'senha'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
