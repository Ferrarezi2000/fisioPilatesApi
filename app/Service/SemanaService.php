<?php

namespace App\Service;

use App\Model\Horario;
use App\Model\Semana;

class SemanaService
{
    private $diasSemana = [
        'SEGUNDA-FEIRA',
        'TERÇA-FEIRA',
        'QUARTA-FEIRA',
        'QUINTA-FEIRA',
        'SEXTA-FEIRA',
    ];

    public function joinHorario(){
        $semana = Semana::all();
        foreach ($semana as $item) {
            $horarios = Horario::where('semana_id', '=', $item->id)->where('vagas', '<>', 0)->get();
            $item->horarios = $horarios;
        }
        return response()->json($semana);
    }

    public function cadastroInicial() {
        foreach ($this->diasSemana as $item) {
            $semana = new Semana();
            $semana->dia = $item;
            $semana->save();
        }
        return response()->json('Cadastro efetuado com sucesso!');
    }
}