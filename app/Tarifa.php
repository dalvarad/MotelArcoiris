<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
     protected $table ="tarifas";

     protected $fillable=['id_tipo', 'horas', 'precio'];
}