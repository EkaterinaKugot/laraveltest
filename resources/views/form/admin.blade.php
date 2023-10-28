@extends('layout')

@section('title', "Form Data")

@section('content')
  <h1>Form Data</h1>   
<table>
    <tr>
    <th style='padding:0px;'></th>
        <th>Name</th>
        <th>Lastname</th>
        <th>Age</th>
        <th>City</th>
        <th>Email</th>
    </tr>
    @foreach($data as $id)
        <tr>
        <td style='padding:0px;'></td>
            @foreach($id as $forms => $item)
                <td>{{$item}}</td>
            @endforeach  
        </tr>
    @endforeach  
</table>
@endsection
