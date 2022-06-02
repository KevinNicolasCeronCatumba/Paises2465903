<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\categoria;

class producto extends Model
{
    use HasFactory;
    //RELACION DE PRODUCTO CON MARCA
    //toda relacion se expresa con una funcion
    public function categoria(){
        return $this->belongsTo(categoria::class);
    }
}
