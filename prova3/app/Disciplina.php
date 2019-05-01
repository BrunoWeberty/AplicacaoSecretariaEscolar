<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $table = "disciplina";

    public function professores()
    {
    	return $this->belongsToMany(Professor::class);
    }
}
