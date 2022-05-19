<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//primera ruta
Route::get('hola' , function(){
    echo "hola 2465903";
});
//ruta de arreglos
Route::get('arreglo' , function(){
    $estudiantes = [ 
        "CA"=>1,
        "JO"=>"Jose",
        "AN"=>1.78,
        "TR"=>true,
    ];
    /*
    echo "<pre>";
    var_dump($estudiantes);
    echo "</pre>";
    */
    //RECORRER EL ARREGLO
    foreach($estudiantes as $e){
        echo $e. "<hr />";
    }
    //agregar elemento en php
    $estudiantes["CR"] = "Nicolas";
    //mostral el recorrido del arreglo
    var_dump($estudiantes);
});
//-
Route::get('paises' , function(){
    //arreglos de paises
    $paises = [ 
        "Colombia" => [
            "Capital"=> "Bogota",
            "Moneda" => "Peso",
            "Poblacion" => 51,
            "Ciudades" => [
                "Medellin",
                "Cali",
                "Barranquilla",
                "Cartagena",
            ],
        ],
        "Peru" =>[
            "Capital"=> "Lima",
            "Moneda" => "Sol",
            "Poblacion" => 32,
            "Ciudades" => [
                "Arequipa",
                "Trujillo",
                "Piura",
            ],
        ],
        "Paraguay" =>[
            "Capital"=> "Asuncion",
            "Moneda" => "Guarani",
            "Poblacion" => 7,
            "Ciudades" => [
                "Luque",
                "Villarrica",
            ],
        ],
        "Bolivia" =>[
            "Capital"=> "Sucre",
            "Moneda" => "Boliviano",
            "Poblacion" => 11,
            "Ciudades" => [
                "La Paz",
                "Tarija",
                "El Alto",
                "Oruro",
                "Trinidad",
                "Cobija"
            ],
        ],
        "Panama" =>[
            "Capital"=> "Ciudad de Panama",
            "Moneda" => "Balboa / Dolar",
            "Poblacion" => 4,
            "Ciudades" => [
                "Ciudad de Panama",
                "Chitre",
                "Las Tablas",
                "Villa Carmen",
                "Colon",
            ],
        ],
    ];
    //Analizar variable 'paises'
    /*
    echo "<pre>";
    var_dump($paises);
    echo "</pre>";
    */
    /*
    //Recorrido de 'paises'
    foreach($paises as $e){
        echo $e. "<hr />";
    }*/

    //mostrar la vista
    return view('paises')->with("paises" , $paises);
});

Route::get('prueba', function(){
    return view('productos.new');
});

//rutas rest - resource
Route::resource('productos' , ProductoController::class);
