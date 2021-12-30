@extends('layouts.master')
@section('content')
    @if(isset($messages) && !empty($messages))
    <div class="row">
        <div class="col-md-6">
            <div class="card">

                <div class="card-header d-block">
                    <h3>Отчеты</h3>
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
                                <th>Дата получения статуса</th>
                                <th>Статус</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $message)
                            <tr>
                                <th scope="row">{{$message->id}}</th>
                                <td>{{$message->number}}</td>
                                <td>{{$message->text}}</td>
                                <td>{{$message->created_at}}</td>
                                <td>{{$message->change_time}}</td>
                                @if($message->status == "0")
                                    <td>
                                        <button type="button" class="btn btn-primary btn-rounded">{{$message->getStatus()}}</button>
                                    </td>
                                @elseif($message->status == "1")
                                    <td>
                                        <button type="button" class="btn btn-success btn-rounded">{{$message->getStatus()}}</button>
                                    </td>
                                @elseif($message->status == "2")
                                    <td>
                                        <button type="button" class="btn btn-danger btn-rounded">{{$message->getStatus()}}</button>
                                    </td>
                                @elseif($message->status == "3")
                                    <td>
                                        <button type="button" class="btn btn-warning btn-rounded">{{$message->getStatus()}}</button>
                                    </td>
                                @endif

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endif
@endsection

