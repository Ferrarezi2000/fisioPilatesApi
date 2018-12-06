<?php

namespace App\Service;

use App\Model\Controle;

class ControleService
{
    public function cadastroInicial() {
        $newControle = new Controle();
        $newControle->nome = 'cadastro-inicial';
        $newControle->concluido = true;
        $newControle->save();
    }
}