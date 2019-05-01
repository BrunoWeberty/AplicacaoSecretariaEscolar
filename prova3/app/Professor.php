<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $table = "professor";

    public function disciplinas()
    {
    	return $this->hasMany(Disciplina::class);
    }
}
