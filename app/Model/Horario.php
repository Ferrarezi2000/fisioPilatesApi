<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horario';
    protected $fillable = ['hora', 'vagas', 'semana_id'];
    protected $hidden = ['created_at', 'updated_at'];

}