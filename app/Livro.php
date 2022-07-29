<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Livro extends Model
{
    protected $fillable = ['titulo', 'autor', 'slug', 'serie', 'volume', 'numero_pagina', 'editora', 'data_inicio_leitura', 'data_fim_leitura', 'foto_capa', 'sinopse'];

    protected $casts = [
        'data_inicio_leitura' => 'datetime:Y-m-d',
        'data_fim_leitura' => 'datetime:Y-m-d',
    ];

    public function setSlug()
    {
        if (!empty($this->titulo)) {
            $this->attributes['slug'] = Str::slug($this->titulo) . '-' . $this->id;
            $this->save();
        }
    }

    public function setFotoCapa($fotoCapa)
    {

        if (!empty($this->foto_capa)) {

            $file =  $fotoCapa->store('capa/' . $this->id);
            $this->foto_capa = $file;
            return    $this->save();
        }
    }

    public function updateFotoCapa($fotoCapa, $id)
    {
        $capaAntiga = Livro::where('id',$id)->first();
        if($capaAntiga->foto_capa && Storage::exists($capaAntiga->foto_capa))
        {
             Storage::delete($capaAntiga->foto_capa);

        }

        if (!empty($this->foto_capa)) {

            $file =  $fotoCapa->store('capa/' . $this->id);
            $this->foto_capa = $file;
            return    $this->save();
        }
    }
    public function getfoto()
    {

        if (empty($this->foto_capa) || !File::exists($this->foto_capa)) {
            return  Storage::url($this->foto_capa);
        } else {
            return url(asset('backend/assets/images/semfoto.png'));
        }
    }


}
