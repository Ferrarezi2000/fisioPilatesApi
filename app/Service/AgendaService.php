<?php

namespace App\Service;

use App\Model\Agenda;
use App\Model\Aluno;
use App\Model\Horario;
use App\Model\Professor;
use App\Model\Semana;

class AgendaService
{
    public function efetuarCadastro($request){
        $aluno = $request->aluno_id;
        $professor = $request->professor_id;
        foreach ($request->lista as $agendaItem) {
                $agenda = new Agenda();
                $agenda->aluno_id = $aluno;
                $agenda->professor_id = $professor;
                $agenda->hora = $agendaItem['hora'];
                $agenda->dia_semana = $agendaItem['dia_semana'];
                $agenda->save();

                $semana = Semana::where('dia', '=', $agendaItem['dia_semana'])->first();
                $horario =  Horario::where('hora', '=', $agendaItem['hora'])->where('semana_id', '=', $semana->id)->first();
                $horario->vagas = $horario->vagas - 1;
                $horario->save();
        }
        return response()->json('Agenda cadastrada com sucesso!');
    }

    public function addProfessorAluno(){
        $agenda = Agenda::all();
        if ($agenda != null) {
            foreach ($agenda as $item) {
                $item->professor = Professor::find($item->professor_id);
                $item->aluno = Aluno::find($item->aluno_id);
            }
        }
        return response()->json($agenda);
    }
}