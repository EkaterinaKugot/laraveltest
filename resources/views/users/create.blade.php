@extends('layout')

@section('title', "Add a user")

@section('content')

<h1>Add a user</h1>

<div>
      
</div>
<form method="post" action="/users">
    @csrf

<div>
      <label>Name</label>
      <input type="text" name="name" value="{{ old('name') }}">
      @error('name')
      <div style="color: red; font-size: 14px">{{$message}}</div>
      @enderror
</div>
<br>
<div>
      <label>LastName</label>
      <input type="text" name="lastname" value="{{ old('lastname') }}">
      @error('lastname')
      <div style="color: red; font-size: 14px">{{$message}}</div>
      @enderror
</div>
<br>

<div>
      <label>Age</label>
      <input type="text" name="age" value="{{ old('age') }}">
      @error('age')
      <div style="color: red; font-size: 14px">{{$message}}</div>
      @enderror
</div>

<br>

<div>
      <label>City</label>
      <select name="city">
        <option value="Irkutsk">Irkutsk</option>
        <option value="Angarsk">Angarsk</option>
        <option value="Bratsk">Bratsk</option>
    </select>
    @error('city')
      <div style="color: red; font-size: 14px">{{$message}}</div>
      @enderror

</div>
<br>
<div>
      <label>Email</label>
      <input type="text" name="email" value="{{ old('email') }}">
      @error('email')
      <div style="color: red; font-size: 14px">{{$message}}</div>
      @enderror
</div>
<br>
<div>
      @foreach($roles as $role)
            <input type="checkbox" name="roles[]" value="{{$role->id}}"/>{{$role->name}}<br/>
      @endforeach 
</div>
<br>
      <button type="submit" name="button">Сreate</button>
</form>

@endsection