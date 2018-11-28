<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda';
    protected $fillable = ['dia_semana', 'hora', 'professor_id', 'aluno_id'];
    protected $hidden = ['created_at', 'updated_at'];

}