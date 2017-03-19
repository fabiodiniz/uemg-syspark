<?php

namespace App\Http\Controllers;

use App\EntradaSaida;
use Illuminate\Http\Request;
use App\Http\Controllers\Input;
use Carbon;
use Redirect;

class EntradaSaidaController extends Controller
{
    public function entrada(Request $request)
    {
    		$entrada = EntradaSaida::create(array(
    				'placa' => $request->get('placa'),
    				'modelo' => $request->get('modelo'),
    				'cor'  => $request->get('cor'),
            'horario_entrada' => Carbon\Carbon::now()
    			));

    		if($entrada->save()){
    			return redirect('saida');
    		}
    }

    public function saida(Request $request)
    {
    		$automovel = EntradaSaida::find($request->carro);
        $automovel->horario_saida = Carbon\Carbon::now();

    		if($automovel->save()){
    			return redirect('saida');
    		}
    }

    public function entradaView() {
        return view('entrada');
    }

    public function saidaView() {
        return view('saida', [
            'automoveis' => EntradaSaida::where('horario_saida', null)->get()
        ]);
    }
}
