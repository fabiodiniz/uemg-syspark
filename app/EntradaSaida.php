<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class EntradaSaida extends Model
{
    protected $table = 'entrada_saida';
    protected $fillable = ['placa', 'modelo', 'cor'];
    protected $dates = ['horario_entrada', 'horario_saida'];

    const CREATED_AT = 'horario_entrada';
    const UPDATED_AT = null;

    function getHorarioEntradaAttribute($value)
    {
        if(isset($value)){
            return Carbon::parse($value)->format('d/m/Y H:m:i');
        }
    }

    function getHorarioSaidaAttribute($value)
    {
        if(isset($value)){
            return Carbon::parse($value)->format('d/m/Y H:m:i');
        }
    }
}
