@extends('layouts.app')

@section('content')
<a href="{{ route('categoria.create')}}">Crear nueva categoria</a>

<table>
  <tr>
    <th>Nombre</th>
    <th>Descripción</th>
    <th></th>
  </tr>  
  @forelse($categorias as $categoria)
  <tr>
    <td >{{$categoria->nombre}}</td>
    <td >{{$categoria->descripcion}}</td>
    <td><a href="{{ route('categoria.show', $categoria->id)}}">Ver</a></td>
    <td><a href="{{ route('categoria.edit', $categoria->id)}}">Editar</a></td>
    <td>
      <form method="POST" action="{{ route('categoria.destroy', $categoria->id)}}">
        @csrf
        @method('DELETE')
        <input type="submit" value="Eliminar">
      </form>
    </td>
  </tr> 
  @empty
    <p>No data.</p>
  @endforelse
</table>    

@endsection