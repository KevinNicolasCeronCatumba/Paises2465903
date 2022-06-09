@extends('layouts.menu')

@section('contenido')
    <div class="row">
        <h1>CATALOGO DE PRODUCTOS</h1>
    </div>
    @foreach($productos as $producto)
        <div class="card small">
            <div class="card-image waves-effect waves-block waves-light ">
                <img class="activator" width="400" height="250" 
                    @if(is_null($producto->imagen))
                        src="{{asset('img/no_disponible.jpg')}}"
                    @else
                        src="{{asset('img/'.$producto->imagen)}}"
                    @endif
                    >
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">{{$producto->nombre}}
                    <i class="material-icons right">Ver mas</i>
                </span>
                <p><a href="{{ url('productos/'.$producto->id) }}">Ver detalles</a></p>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">{{$producto->nombre}}<i class="material-icons right">X</i></span>
                <p>DESCRIPCION:<br>{{$producto->descripcion}}</p>
                <p>PRECIO:<br>{{$producto->precio}}</p>
                <p class="grey-text">MARCA:<br>{{$producto->marca->nombre}}</p>
                <p class="grey-text">CATEGORIA:<br>{{$producto->categoria->nombre}}</p>
            </div>
        </div>
    @endforeach

@endsection