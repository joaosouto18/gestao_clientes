<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    public function produto() {
        return $this->belongsTo('App\Produto');
    }
    public function loja() {
        return $this->belongsTo('App\Loja');
    }
}
