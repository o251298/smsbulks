@extends('admin.layout.master')
@section('title', 'Все смс')
@section('content')
    @if(isset($messages) && !empty($messages))
        <div class="row">

            <div class="col-md-8">
                <div class="card">

                    <div class="card-header d-block">
                        <h3>Отчеты</h3>

                        @if(session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{session('error')}}
                            </div>
                            @endif
                    </div>
                    <form action="{{route('admin.messages')}}" method="get" style="padding: 20px">
                        @csrf
                        <label for="">Текст</label>
                        <input type="text" class="form-control" placeholder="Введите текст сообщения..." name="text" @if(request()->has('text')) value="{{request()->get('text')}}" @endif>
                        <label for="">Номер телефона</label>
                        <input type="text" class="form-control" placeholder="Введите номер..." name="number" @if(request()->has('number')) value="{{request()->get('number')}}" @endif>

                        <label for="">Пользователь</label>
                        <input type="text" class="form-control" placeholder="Пользователь" name="user" @if(request()->has('number')) value="{{request()->get('user')}}" @endif>
                        <label for="">Колво на странице</label>
                        <select name="count" class="form-control">
                            @if(request()->has('count')) <option value="{{request()->get('count')}}">{{request()->get('count')}}</option> @endif
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="500">500</option>
                        </select>
                        <div class="row">

                            <div class="col-sm-12 col-xl-4 mb-30">
                                <label for="">Выбор даты</label>
                                <input class="form-control" type="datetime-local" name="date_first" @if(request()->has('date_first')) value="{{request()->get('date_first')}}" @endif />
                                <input class="form-control" type="datetime-local" name="date_second" @if(request()->has('date_second')) value="{{request()->get('date_second')}}" @endif />
                            </div>
                        </div>
                        <input type="submit" class="btn btn-success">
                    </form>
                    <form action="{{route('admin.messages')}}" method="post" style="padding: 20px">
                        @csrf
                        <input type="submit" value="Очистить" class="btn btn-danger">
                    </form>
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
                                    <th>Пользователь</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($messages as $message)
                                    <tr>
                                        <th scope="row">{{$message->id}}</th>
                                        <td>{{$message->number}}</td>
                                        <td>{{$message->short_message}}</td>
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
                                        @if(isset($message->user()->first()['name']) && $message->user()->first()['name'] !== null)
                                        <td>{{$message->user()->first()['name']}}</td>
                                        @else
                                            <td>Пользователь удален</td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>

                </div>
                <div>{{$messages->links()}}</div>
            </div>
        </div>
    @endif



@endsection
