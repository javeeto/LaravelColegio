<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    //
    protected $fillable = ['documento','apellidos','nombres','genero','fechanacimiento'];
}
