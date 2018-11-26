<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = 'aluno';
    protected $fillable = ['nome', 'data_nascimento', 'observacao'];
    protected $hidden = ['created_at', 'updated_at'];

}