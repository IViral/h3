<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cortes extends Model
{
    protected $fillable = ['nome', 'salao_id', 'user_id', 'preco', 'img'];
}
