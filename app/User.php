<?php

namespace App;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','perfil'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function updateFotoPerfil($fotoPerfil, $id)
    {

        $perfilAntiga = User::where('id',$id)->first();

        if($perfilAntiga->perfil && Storage::exists($perfilAntiga->perfil))
        {
             Storage::delete($perfilAntiga->perfil);

        }

        if (!empty($this->perfil)) {

            $file =  $fotoPerfil->store('user/' . $this->id);
            $this->perfil = $file;
            return    $this->save();
        }
    }
    public function getfoto()
    {

        if (empty($this->perfil) || !File::exists($this->perfil)) {
            return  Storage::url($this->perfil);
        } else {
            return url(asset('backend/assets/images/semfoto.png'));
        }
    }
}
