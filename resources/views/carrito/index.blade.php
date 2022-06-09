@extends('layouts.menu')
@section('contenido')
    @if(!session('cart'))
        <p>Variable no exitente</p>
    @else
        <div class="row">
            
            {{session('cart')[0]["name"]}}
            {{session('cart')[0]["cantidad"]}}
            
        </div>
        <form action="{{ route('carrito.destroy',1) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn waves-effect waves-light teal accent-3" type="submit" name="action">ELIMINAR CARRITO</button>
        </form>
    @endif
@endsection