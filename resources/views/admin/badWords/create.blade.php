@extends('admin.layout.master')
@section('title', 'Создать плохое слово')
@section('content')
    <h4>Стоп слова</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                @if(session('success'))
                    <div style="padding: 10px">
                        <div class="alert bg-success alert-success text-white"  role="alert">
                            {{session('success')}}
                        </div>
                    </div>
                @endif
                @if(session('sql_error'))
                    <div style="padding: 10px">
                        <div class="alert bg-warning alert-warning text-white"  role="alert">
                            {{session('sql_error')}}
                        </div>
                    </div>
                @endif
                <div class="card-header"><h3>Фильтрация</h3></div>
                <div class="card-body">
                    <form class="forms-sample" method="post" action="{{route('admin.badword.store')}}">
                        @csrf
                        <div class="form-group">
                            @error('originator')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                            <label for="exampleSelectGender">Плохое слово</label>
                            <input type="text" class="form-control" name="badword" placeholder="Плохое слово">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
