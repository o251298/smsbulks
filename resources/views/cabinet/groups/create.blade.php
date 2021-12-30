@extends('layouts.master')
@section('content')
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

                @if(session('error'))
                        <div style="padding: 10px">
                            <div class="alert bg-danger alert-danger text-white"  role="alert">
                                {{session('error')}}
                            </div>
                        </div>
                    @endif
                <div class="card-header"><h3>Создать базу</h3></div>
                <div class="card-body">
                    <form class="forms-sample" enctype="multipart/form-data" method="post" action="{{route('groups.store')}}">
                        @csrf
                        <div class="form-group">
                            @error('group_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="exampleSelectGender">Название базы</label>
                            <input type="text" class="form-control" name="group_name">
                        </div>

                        <div class="form-group">
                            @error('csv')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="exampleInputPassword4">База в формате csv</label>
                            <input type="file" class="form-control" name="csv" placeholder="Номер получателя">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Загрузить</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title">Информация</h4>
                    <h5 class="card-title">Вы можете загрузить базу в формате csv (разделитель - запятая).</h5>
                    <p>Номера в базе должны юыть только Украинские, в противном случае - база не загрузиться. Так же номера должны быть в МЕЖДУНАРОДНОМ формате (380). Все пробелы, спец символы будут обрезаны автоматически</p>
                    <p>Так же при парсинге базы будут удалены дубли и отсеяны некорректные номера</p>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/9eQnz29AcPg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection

