@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                @if(session('success_single_sms'))
                    <div style="padding: 10px">
                        <div class="alert bg-success alert-success text-white"  role="alert">
                            {{session('success_group')}}
                        </div>
                    </div>
                @endif

                <div class="card-header"><h3>Создать пакет</h3></div>
                <div class="card-body">
                    <form class="forms-sample" enctype="multipart/form-data" method="post" action="{{route('balance.store')}}">
                        @csrf

                        <select name="user_id" id="">
                            @foreach($users as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>

                        <div class="form-group">
                            <label for="exampleSelectGender">Сумма</label>
                            <input type="text" class="form-control" name="total_sum">
                        </div>

                        <div class="form-group">
                            <label for="exampleTextarea1">Описание:</label>
                            <textarea class="form-control" id="textMessage" name="description" rows="8"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light" type="button" id="test">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title">Информация</h4>
                    <h5 class="card-title">Количество символов
                        Количество символов в SMS-сообщениях одинаково у всех операторов:</h5>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Кол-во частей</th>
                            <th>Символов Латинницей</th>
                            <th>Символов Кириллицей</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>160</td>
                            <td>70</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>306</td>
                            <td>134</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>459</td>
                            <td>201</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>612</td>
                            <td>268</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

