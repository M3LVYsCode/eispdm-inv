@extends('layouts.app')

@section('content')

<a href="{{ route('categoria.index')}}">Atras</a>
<form method="POST" action="{{ route('categoria.update' , $categoria->id)}}">
  @method('PUT')
 
  <label>Nombre:</label>
  <input type="text" name="nombre" value="{{ $categoria->nombre }}"/>
  <label>Descripción:</label>
  <input type="text" name="descripcion" value="{{ $categoria->descripcion }}"/>
  <label>Activo:</label>
  <input type="text" name="activo" value="{{ $categoria->activo }}"/>
  <input type="submit" value="Editar">
</form>  
@endsection