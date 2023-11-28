@extends('layout')

@section('title', "Edit a user")

@section('content')

<h1>Edit a user</h1>

<div>
      
</div>
<form method="post" action="/users/{{$user->id}}">
    @csrf

<div>
      <label>Name</label>
      <input type="text" name="name" value="{{$user->name}}">
      @error('name')
      <div style="color: red; font-size: 14px">{{$message}}</div>
      @enderror
</div>
<br>
<div>
      <label>LastName</label>
      <input type="text" name="lastname" value="{{$user->lastname}}">
      @error('lastname')
      <div style="color: red; font-size: 14px">{{$message}}</div>
      @enderror
</div>
<br>

<div>
      <label>Age</label>
      <input type="text" name="age" value="{{$user->age}}">
      @error('age')
      <div style="color: red; font-size: 14px">{{$message}}</div>
      @enderror
</div>

<br>

<div>
      <label>City</label>
      <select name="city">
      <?php $city = ["Irkutsk", "Angarsk", "Bratsk"];
      $selected = '';?>
      @for($i = 0; $i < 3; $i++)
            @if($city[$i] == $user->city)
                  {{$selected = 'selected'}}
            @else
                  {{$selected = ''}}
            @endif
            <option value="{{$city[$i]}}" {{$selected}}>{{$city[$i]}}</option>  
      @endfor
    </select>
    @error('city')
      <div style="color: red; font-size: 14px">{{$message}}</div>
      @enderror

</div>
<br>
<div>
      <label>Email</label>
      <input type="text" name="email" value="{{$user->email}}">
      @error('email')
      <div style="color: red; font-size: 14px">{{$message}}</div>
      @enderror
</div>
<br>
<div>

      @foreach($roles as $role)
      <?php $ckecked = false;?>
            @foreach($user->roles as $r)
                  @if($r->name == $role->name)
                        <input type="checkbox" name="roles[]" checked value="{{$role->id}}"/>{{$role->name}}<br/>
                        <?php $ckecked = true;?>
                        @break
                  @endif  
            @endforeach
            @if(!$ckecked)
                  <input type="checkbox" name="roles[]" value="{{$role->id}}"/>{{$role->name}}<br/>
            @endif  
      @endforeach 
</div>
<br>
      <button type="submit" name="button">Update</button>
</form>

@endsection