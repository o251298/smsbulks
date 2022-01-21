@extends('admin.layout.master')
@section('title', 'Альфа имена')
@section('content')
    <h4>Альфа имена</h4>
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Альфа имя</th>
            <th scope="col">Пользователь</th>
            <th scope="col">Дата создания</th>
            <th scope="col">Статус</th>
            <th scope="col">Принять</th>
            <th scope="col">Отклонить</th>
        </tr>
        </thead>
        <tbody>
        @foreach($originators as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td style="font-size: 15px">{{$item->originator}}</td>
                <td style="font-size: 15px">{{$item->user()->first()['name']}}</td>
                <td style="font-size: 15px">{{$item->created_at}}</td>
                <td>
                    <span class="badge rounded-pill bg-{{$item->getStatus()['label']}} text-dark">{{$item->getStatus()['status']}}</span>
                </td>
                <td><a href="{{route('admin.originators.activate', [$item])}}" class="btn btn-success">Принять</a></td>
                <td><a href="{{route('admin.originators.deactivate', [$item])}}" class="btn btn-danger">Отклонить</a></td>



            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
