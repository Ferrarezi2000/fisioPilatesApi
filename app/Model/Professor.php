<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $table = 'professor';
    protected $fillable = ['nome'];
    protected $hidden = ['created_at', 'updated_at'];

}