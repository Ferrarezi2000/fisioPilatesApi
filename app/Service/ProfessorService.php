<?php

namespace App\Service;

use App\Model\Agenda;
use App\Model\Professor;
use Illuminate\Support\Facades\DB;

class ProfessorService
{
    public function lista(){
        $professores = DB::table('professor')->orderBy('nome', 'asc')->get();
        foreach ($professores as $item) {
                $totalAulas = Agenda::where('professor_id', '=', $item->id)->count();
                $item->totalAulas = $totalAulas;
        }
        return response()->json($professores);
    }

    public function cadastroInicial() {
        $professor = new Professor();
        $professor->nome = 'Thalita Vitral';
        $professor->senha = 'hentai';
        $professor->save();
    }
}