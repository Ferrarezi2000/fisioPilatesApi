<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table = 'administrador';
    protected $fillable = ['nome', 'senha', 'email'];
    protected $hidden = ['created_at', 'updated_at'];

}