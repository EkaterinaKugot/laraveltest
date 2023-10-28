@extends('layout')

@section('title', $title)

@section('content')

  <!-- @section('button')
    <span>Play</span>
    <button>Play</button>
  @show -->

  <h1>Users List</h1>   
  <ul>

  @each('users.single-user', $users, 'user')

  </ul>

  <!-- @yield('button') -->

@endsection 

