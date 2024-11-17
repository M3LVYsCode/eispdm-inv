@extends('layouts.app')

@section('content')

<a href="{{ route('categoria.index')}}">Atras</a>
<form method="POST" action="{{route('categoria.store')}}">

  <label>Nombre:</label>
  <input type="text" name="nombre"/>
  <label>Descripción:</label>
  <input type="text" name="descripcion"/>
  <input type="submit" value="Create">
</form>  
@endsection