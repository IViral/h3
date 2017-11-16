<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salaos extends Model
{
    public function cortes()
    {
        return $this->belongsTo('App\Cortes');
    }
}
