<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Semana extends Model
{
    protected $table = 'semana';
    protected $fillable = ['dia'];
    protected $hidden = ['created_at', 'updated_at'];

}