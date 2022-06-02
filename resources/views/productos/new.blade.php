@extends('layouts.menu')

@section('contenido')

@if(session('mensajito'))
<div class="row">
    <span>{{session('mensajito')}}</span>
</div>
@endif
    <div class="row">
        <h1 class="teal-text text-accent-4">NUEVO PRODUCTO</h1>
    </div>
    <div class="row">
        <form action="{{route('productos.store')}}" method="POST" class="col s8" enctype="multipart/form-data">
            @csrf
            <!---->
            <div class="row">
                <div class="input-field cold s8">
                    <input type="text" placeholder="Nombre de producto" id="nombre" name="nombre" value="{{old('nombre')}}">
                    <label for="nombre">Nombre</label>
                    <span class="red-text text-darken-2">{{$errors->first('nombre')}}</span>
                </div>
            </div>
            <!---->
            <div class="row">
                <div class="input-field cold s8">
                    <textarea name="desc" id="desc" class="materialize-textarea" >{{old('desc')}}</textarea>
                    <label for="desc">Descripcion</label>
                    <span class="red-text text-darken-2">{{$errors->first('desc')}}</span>
                </div>
            </div>
            <!---->
            <div class="row">
                <div class="input-field cold s8">
                    <input type="text" id=" " name="precio" value="{{old('precio')}}">
                    <label for="precio">Precio</label>
                    <span class="red-text text-darken-2">{{$errors->first('precio')}}</span>
                </div>
            </div>
            <!---->
            <div class="row">
                <div class="input-field col s8">
                    <select name="marca" id="marca">
                        <option value="" selected disabled>SELECCIONE MARCA</option>
                        @foreach($marcas as $marca)
                        <option value="{{$marca->id}}"  >{{$marca->nombre}}</option>
                        @endforeach
                    </select>
                    <label for="marca">ELIJA MARCA</label>
                    <span class="red-text text-darken-2">{{$errors->first('marca')}}</span>
                </div>
                
            </div>
            <!---->
            <div class="row">
                <div class="input-field col s8">
                    <select name="categoria" id="categoria">
                        <option value="" selected disabled>SELECCIONE CATEGORIA</option>
                        @foreach($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                        @endforeach
                    </select>
                    <label for="categoria">ELIJA CATEGORIA</label>
                    <span class="red-text text-darken-2">{{$errors->first('categoria')}}</span>
                </div>
                
            </div>
            <!---->
            <div class="row">
                <div class="file-field input-field col s8">
                    <div class="btn teal accent-3">
                        <span>Imagen del producto ...</span>
                        <input type="file" name="imagen">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path" type="text">
                    </div>
                </div>
                <span class="red-text text-darken-2">{{$errors->first('imagen')}}</span>
            </div>
            <!---->
            <div class="row">
                <button class="btn waves-effect waves-light teal accent-3" type="submit" name="action">GUARDAR</button>
            </div>
            <!---->
        </form>
    </div>
@endsection