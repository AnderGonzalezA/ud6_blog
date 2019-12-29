@extends('layouts.admin')
@section('admin')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <h2>Quitarle un rol al usuario {{$user->id}}</h2>
      <form action="{{route('destroyRolUser', $user->id)}}" method="post">
        @csrf
        <label for="role_id">Roles:</label>
        <select class="" name="role_id">
          @foreach ($user->roles as $rol)
            <option value="{{$rol->id}}">{{$rol->name}}</option>
          @endforeach
        </select><br><br>
        <input type="submit" name="" value="Quitar rol">
      </form>
    </main>
@endsection
