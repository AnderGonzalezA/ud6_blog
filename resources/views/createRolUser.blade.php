@extends('layouts.admin')
@section('admin')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <h2>Añadir un rol al usuario {{$user_id}}</h2>
      <form action="{{route('addRolUser', $user_id)}}" method="post">
        @csrf
        <label for="role_id">Roles:</label>
        <select class="" name="role_id">
          @foreach ($roles as $rol)
            <option value="{{$rol->id}}">{{$rol->name}}</option>
          @endforeach
        </select><br><br>
        <input type="submit" name="" value="Añadir rol">
      </form>
    </main>
@endsection
