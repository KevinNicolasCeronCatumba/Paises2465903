<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //seleccionar todos los productos de la base de datos
        $productos = Producto::all();
        //mostar el catalogo de producto llevandole las lista de productos
        return view("productos.index")->with('productos',$productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //seleccion de todas las marcas
        $marcas = Marca::all();
        //seleccion de todas las categorias
        $categorias = Categoria::all();
        //llevar datos a la vista, con marcas y categorias
        return view('productos.new')
                    ->with('marcas' , $marcas) 
                    ->with('categorias' , $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        //verificar datos recibidos
        //1.establecer las reglas de validacion que apliquen a cada campo 
        $reglas =[
            "nombre"=>'required|alpha',
            "desc"=>'required|min:20|max:100',
            "precio"=>'required|numeric',
            "marca"=>'required',
            "categoria"=>'required',
            "imagen"=>'required|image',
        ];
        //mensajes   ""=>"",
        $mensajes =[
            "required"=>"Campo obligatorio*",
            "alpha"=>"Solo letras*",
            "min"=>"Minimo 20 caracteres*",
            "max"=>"Maximo 100 caracteres*",
            "numeric"=>"Solo caracteres numericos*",
            "image"=>"Solo se aceptan archivos de imagen*",
        ];

        //2.crear el objeto validador
        $v = Validator::make(
            $r->all(),
            $reglas,
            $mensajes,
        );
        //3.validar la input data
        if ($v->fails()) {
            //validacion fallida
            //redireccionar al formulario
            return redirect('productos/create')->withErrors($v)->withInput();
        }else{
            //analizar la input data "imagen"
            /*echo "<pre>";
            var_dump($r->imagen);
            echo "</pre>";*/
            //acceder a propiedades del archivo cargado
            $archivo = $r->imagen;
            $nombre_archivo = $archivo->getClientOriginalName();
            //establecer ubicacion / ruta donde se cargara o almacenara el archivo
            $ruta=public_path()."/img";
            //mover el archivo 
            $archivo->move($ruta,$nombre_archivo);
            //validacion correcta
            //crear nuevo producto<<entity>>
            $p = new Producto;
            //asignar valores a los atributos del objeto
            //p = base de datos
            //r = formulario html
            $p->nombre=$r->nombre;
            $p->imagen = $nombre_archivo;
            $p->descripcion=$r->desc;
            $p->precio=$r->precio;
            $p->marca_id=$r->marca;
            $p->categoria_id=$r->categoria;
            //guardar bd
            $p->save();
            //redireccionar al formulario con mensaje de exito (session)
            return redirect('productos/create')->with('mensajito',"Producto registrado");

        }      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        echo "aqui van los detalles de producto con id: $producto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo "aqui va a ir el formulario para actualizar el producto: $producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
