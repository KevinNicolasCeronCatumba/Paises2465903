@extends('layouts.menu')

@section('contenido')
    <div class="row">
        <h1 class="teal-text text-accent-4">NUEVO PRODUCTO</h1>
    </div>
    <div class="row">
        <form action="" class="col s8">
            <div class="row">
                <div class="input-field cold s8">
                    <input type="text" placeholder="Nombre de producto" id="nombre" name="nombre">
                    <label for="nombre">Nombre</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field cold s8">
                    <textarea name="desc" id="desc" class="materialize-textarea"></textarea>
                    <label for="desc">Descripcion</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field cold s8">
                    <input type="text" id="precio" name="precio">
                    <label for="precio">Precio</label>
                </div>
            </div>
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
            </div>
            <div class="row">
                <button class="btn waves-effect waves-light teal accent-3" type="submit" name="action">GUARDAR</button>
            </div>
        </form>
    </div>
@endsection