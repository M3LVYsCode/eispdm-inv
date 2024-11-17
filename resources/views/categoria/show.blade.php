@extends('layouts.app')

@section('content')
<a href="{{ route('categoria.index')}}">Back</a>
<h1>{{ $categoria->nombre }}</h1>
<p>{{ $categoria->descripcion}}<p>
@endsection