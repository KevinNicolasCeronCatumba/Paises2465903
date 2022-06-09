@extends('layouts.menu')
@section('contenido')
<div class="row">
    <h1>{{$producto->nombre}}</h1>
</div>
<div class="row">
    <div class="col s8">
        <div class="row">
            <img width="600" height="350" 
                @if(is_null($producto->imagen))
                    src="{{asset('img/no_disponible.jpg')}}"
                @else
                    src="{{asset('img/'.$producto->imagen)}}"
                @endif            
            >
        </div>
        <div class="row">
            <ul class="collection">
                <li class="collection-item"><strong>DESCRIPCION:</strong><br>{{$producto->descripcion}}</li>
                <li class="collection-item"><strong>PRECIO:<br><p class="teal-text">{{$producto->precio}}</p></strong></li>
                <li class="collection-item"><p class="grey-text">MARCA:<br>{{$producto->marca->nombre}}</p></li>
                <li class="collection-item"><p class="grey-text">CATEGORIA:<br>{{$producto->categoria->nombre}}</p></li>
            </ul>
        </div>
    </div>
    <div class="col s4">
        <form method="POST" action="{{ route('carrito.store')}}">
            @csrf
            <div class="row">
                <h3>Añadir al carrito</h3>
            </div>
            <div class="row">
                <div class="col s4 input.field">
                    <label for="cantidad">Cantidad</label>
                    <select name="cantidad" id="cantidad">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    
                </div>
            </div>
            <div class="row">
                <div class="col s4">
                    <button class="btn waves-effect waves-light teal accent-3" type="submit" name="action">Agregar</button>
                </div>
            </div>
            <input type="hidden" name="prod_id" value="{{$producto->id}}">
            <input type="hidden" name="prod_name" value="{{$producto->nombre}}">
        </form>
    </div>
</div>
@endsection