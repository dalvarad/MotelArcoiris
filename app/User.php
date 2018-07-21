<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'nombre', 'apellido', 'rut', 'telefono', 'color','email', 'password', 'username','id_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userType(){
        return $this->belongsTo('App\userType');
    }

    public function controlHorario(){
        return $this->hasMany('App\controlHorario');
    }

    public function jornada(){
        return $this->belongsToMany('App\Jornada','users_jornadas','id_user','id_jornada')
            ->withPivot('fecha_entrada','fecha_salida');
    }

    public function scopeType($query, $type){
        
        if($type !="" || isset($type[$type])){
            return $query->where('id_type', $type);
        }

    }
    public function scopeNombre($query, $nombre){
        
        if(trim($nombre)!=""){
            return $query->where('nombre',"LIKE", "%$nombre%");
        }

    }
}
