@extends('layout')

@section('title')
  {{$title}}
@endsection

@section('content')
  <h1>Users Info</h1>   

  <p>User name: {{$name}}</p>

  @section('extra')
    <div>Full information will be available later!</div>
    @show
@endsection
