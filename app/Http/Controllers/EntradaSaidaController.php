<?php

namespace App\Http\Controllers;

use App\EntradaSaida;
use Illuminate\Http\Request;
use App\Http\Controllers\Input;
use Illuminate\Validation\Rule;
use Carbon;
use Redirect;

class EntradaSaidaController extends Controller
{
    public function __construct()
    {
        $this->totalVagas = 5;
        $this->vagasOcupadas = EntradaSaida::where('horario_saida', null)->count();
        $this->vagasDisponiveis = $this->totalVagas - $this->vagasOcupadas;
    }

    public function entrada(Request $request)
    {
        $this->validate($request, [
            'placa' => [
                'required',
                Rule::unique('entrada_saida')->where(function ($query) {
                    $query->where('horario_saida', null);
                })
            ],
            'modelo' => 'required|max:20',
            'cor' => 'required|max:20'
        ]);

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
        return view('entrada', [
            'vagasDisponiveis' => $this->vagasDisponiveis
        ]);
    }

    public function saidaView() {
        return view('saida', [
            'vagasDisponiveis' => $this->vagasDisponiveis,
            'automoveis' => EntradaSaida::orderBy('id', 'desc')->where('horario_saida', null)->get()
        ]);
    }

    public function relatorioView() {
        return view('relatorio', [
            'vagasDisponiveis' => $this->vagasDisponiveis,
            'automoveis' => EntradaSaida::orderBy('id', 'desc')->get()
        ]);
    }
}
