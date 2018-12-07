<?php

namespace App\Service;

use App\Model\Agenda;
use App\Model\Aluno;
use App\Model\Horario;
use App\Model\Professor;
use App\Model\Semana;
use http\Env\Response;
use Illuminate\Support\Facades\DB;

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

    public function listaPorDia($request) {
        $professor = Professor::where('nome', '=', $request->nome)->first();
        $diaSemana = DB::table('semana')->select('id', 'dia')->get();
        if (is_null($professor)) {
            foreach ($diaSemana as $dia) {
                $dia->aulas = Agenda::where('dia_semana', '=', $dia->dia)->get();
                foreach ($dia->aulas as $aula) {
                    $aula->aluno = Aluno::where('id', '=', $aula->aluno_id)->first();
                }
            }
            return response()->json($diaSemana);
        } else {
            foreach ($diaSemana as $dia) {
                $dia->aulas = Agenda::where('dia_semana', '=', $dia->dia)->where('professor_id', '=', $professor->id)->get();
                foreach ($dia->aulas as $aula) {
                    $aula->aluno = Aluno::where('id', '=', $aula->aluno_id)->first();
                }
            }
            return response()->json($diaSemana);
        }
    }

    public function agendaLivre() {
        $semana = Semana::all();
        foreach ($semana as $dia) {
            $dia->vagas = Horario::where('vagas', '<>', '0')->where('semana_id', '=', $dia->id)->get();
        }
        return response()->json($semana);
    }
}