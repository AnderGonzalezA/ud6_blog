@extends('layouts.app')

@section('content')
<div class="container">
  @if (Auth::user()->hasRole("admin"))
    Bienvenido a la interfaz de un usuario administrador.
  @else
    Bienvenido a la interfaz de un usuario editor.
  @endif
</div>
@endsection
