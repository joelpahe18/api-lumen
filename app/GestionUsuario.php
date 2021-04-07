<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class GestionUsuario extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;
    protected $table = 'gestion_usuario';

    /**
     * Listado de atributos accesibles.
     *
     * @var array
     */
    protected $fillable = [
        'coreleusu',
        'claaccusu',
        'telmovusu',
        'nomcomusu',
        'apecomusu',
        'painacusu',
        'fecnacusu',
        'tipsexusu',
        'correccla'
    ];

    /**
     * Listado de atributos que se ocultan,
     * en la respuesta json.
     *
     * @var array
     */
    protected $hidden = [
        'codunireg',
        'claaccusu',
    ];
}
