@extends('layout')

@section('title', 'Moderation')

@section('content')
  <h1>Moderation of comments</h1>
  @if(count($comments) == 0)
    <p>Нет комментариев для модерации</p>
  @else
  <table >
    <tr>
        <th>К чему</th>
        <th>Описание</th>
        <th>Время</th>
        <th>Статут</th>
        <th>Одобрить</th>
    </tr>
  @foreach($comments as $com)
  <tr>
    <td>@if($com->commentable_type == 'App\Models\Post')
        К посту
        @elseif($com->commentable_type == 'App\Models\User')
        К пользователю
        @endif</td>
    <td>@if(strlen($com->content) <= 30) 
        {{$com->content}}
        @else
        {{substr($com->content, 0, 30)}}
        @endif
        ...
    </td>
    <td>{{$com->created_at}}</td>
    <td>На модерирование</td>
    <td><a href="/comments/moderation/{{$com->id}}">Approve</a></td>
</tr>
    @endforeach 
</table>
  @endif



@endsection 