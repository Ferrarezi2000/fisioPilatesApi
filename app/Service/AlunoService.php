<?php

namespace App\Service;

use App\Model\Agenda;
use App\Model\Aluno;

class AlunoService
{
    public function apagar(Aluno $aluno) {
        $agendas = Agenda::where('aluno_id', '=', $aluno->id)->get();
        $total = Agenda::where('aluno_id', '=', $aluno->id)->count();
        if ($total > 0) {
            foreach ($agendas as $agenda) {
                $agenda->delete();
            }
        }
        $aluno->delete();
        return response()->json('Aluno apagado co sucesso!');
    }
}