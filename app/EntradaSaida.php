<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntradaSaida extends Model
{
    protected $table = 'entrada_saida';
    protected $fillable = ['placa', 'modelo', 'cor'];

    const CREATED_AT = 'horario_entrada';
    const UPDATED_AT = null;
}
