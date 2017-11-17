<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salaos extends Model
{
    protected $fillable = ['nome', 'setor', 'endereco', 'numero', 'user_id'];
}
