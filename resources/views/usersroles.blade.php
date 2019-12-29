@extends('layouts.admin')
@section('admin')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <h2>Users and Roles</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Id del usuario</th>
              <th>Nombre del usuario</th>
              <th>Roles</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>
                @foreach ($user->roles as $role)
                  {{$role->name}}&nbsp;
                @endforeach
              </td>
              <td><a href="{{route('createRolUser',$user->id)}}">Añadir un rol</a></td>
              <td><a href="{{route('removeRolUser',$user->id)}}">Quitar un rol</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </main>
@endsection
