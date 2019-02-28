<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getJWTIdentifier()
    {
        // Retornar o Identificador do sujeito
        return $this->id;
    }
    public function getJWTCustomClaims()
    {
        // Retornar Informações contidas dentro do token
        return [
        'email' => $this->email,
        'name' => $this->name
      ];
        // não devem ser informações sensíveis pois em caso
      // de ataque ao token elas serão totalmente e facilmente expostas
    }
}
