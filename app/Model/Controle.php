<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Controle extends Model
{
    protected $table = 'controle';
    protected $fillable = ['nome', 'concluido'];
    protected $hidden = ['created_at', 'updated_at'];

}