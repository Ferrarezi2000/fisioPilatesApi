<?php

namespace App\Service;

use App\Model\Horario;
use App\Model\Semana;

class HorarioService
{
    private $horaLista = [
        '07:00 - 08:00',
        '08:00 - 09:00',
        '09:00 - 10:00',
        '10:00 - 11:00',
        '11:00 - 12:00',
        '12:00 - 13:00',
        '13:00 - 14:00',
        '14:00 - 15:00',
        '15:00 - 16:00',
        '16:00 - 17:00',
        '17:00 - 18:00',
        '18:00 - 19:00',
        '19:00 - 20:00',
        '20:00 - 21:00',
    ];

    public function cadastroInicial() {
        $semana = Semana::all();
        foreach ($semana as $dia) {
            foreach ($this->horaLista as $item) {
                $horario = new Horario();
                $horario->hora = $item;
                $horario->vagas = '4';
                $horario->semana_id = $dia->id;
                $horario->save();
            }
        }
    }

    public function joinHorario(){
        $horario = Horario::all();
        foreach ($horario as $item) {
            $item->dia = Semana::find($item->semana_id);
        }
        return response()->json($horario);
    }
}