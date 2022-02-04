@extends('admin.layout.master')
@section('title', 'Список плохих слов')
@section('content')
    @if(isset($badwords) && !empty($badwords))
        <div class="row">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <table class="table table-inverse">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Текст</th>
                                    <th>Удалить</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($badwords as $badword)
                                    <tr>
                                        <th scope="row">{{$badword->id}}</th>
                                        <th scope="row">{{$badword->word}}</th>
                                        <th scope="row">
                                            <a href="{{route('admin.badword.destroy', $badword)}}">Удалить</a>
                                        </th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div>{{$badwords->links()}}</div>
            </div>
        </div>
    @endif



@endsection
