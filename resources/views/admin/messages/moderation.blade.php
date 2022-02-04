@extends('admin.layout.master')
@section('title', 'Все смс')
@section('content')
    @if(isset($messages) && !empty($messages))
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header d-block">
                        <h3>Модерация</h3>
                    </div>
                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <table class="table table-inverse">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Номер</th>
                                    <th>Текст</th>
                                    <th>Дата отправки</th>
                                    <th>Выделить</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($messages as $message)
                                    <tr>
                                        <th scope="row">{{$message->id}}</th>
                                        <td>{{$message->number}}</td>
                                        <td>{{$message->text}}</td>
                                        <td>{{$message->created_at}}</td>
                                        <form action="{{route('admin.moderation.pass')}}" method="post">
                                            <td><input type="checkbox" name="message_id[]" value="{{$message->id}}"></td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            @csrf
                            <input type="submit" name="pass" value="pass" class="btn btn-success">
                            <input type="submit" name="block" value="block" class="btn btn-danger">
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endif
@endsection

