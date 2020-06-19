<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public function grupo() {
        return $this->belongsTo('App\Grupo');
    }
    public function colecao() {
        return $this->belongsTo('App\Colecao');
    }
}
