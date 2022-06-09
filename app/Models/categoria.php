<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    //relacion entre categoria y producto
    public function productos(){
        return $this->hasMany(producto::class);
    }
}
