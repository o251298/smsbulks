@extends('admin.layout.master')
@section('title', 'Пользователи')
@section('content')
    <h4>Пользователи</h4>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Логин</th>
            <th scope="col">Почта</th>
            <th scope="col">Перейти</th>
            <th scope="col">Деактивировать пользователя</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td style="font-size: 15px">{{$item->name}}</td>
            <td style="font-size: 15px">{{$item->email}}</td>
            <td><a href="{{route('change', [$item->id])}}" class="btn btn-info">Перейти</a></td>
            <td><a href="{{route('admin.users.destroy', [$item])}}" class="btn btn-danger">Удалить</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
