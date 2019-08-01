@extends('layouts.app')

@section('title','User List')

@section('content')


<div class="container" align="center">
<div><h2>User Lists</h2></div></br>

<table class="table">
  <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Username</th>
        <th scope="col">E-mail</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>    
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>

      
    @endforeach
  </tbody> 
</table>
</div>
<div class="pagination justify-content-center">
    {{ $users->links() }}
</div>
@endsection