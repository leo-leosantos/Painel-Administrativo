<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Rodape extends Model
{
    protected $fillable=['frase','autor_frase','status'];


    public function setSatus($request)
    {


        $this->status = $request;
        $this->save();

    }

}
