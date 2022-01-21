<?php
use Illuminate\Support\Facades\Auth;
?>

@extends('layouts.master')
@section('title', "Отправка одиночного смс")
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                @if(session('success_single_sms'))
                <div style="padding: 10px">
                    <div class="alert bg-success alert-success text-white"  role="alert">
                        {{session('success_single_sms')}}
                    </div>
                </div>
                @endif
                    @if(session('error'))
                        <div style="padding: 10px">
                            <div class="alert bg-warning alert-warning text-white"  role="alert">
                                {{session('error')}}
                            </div>
                        </div>
                    @endif
                    @if(session('too_many_parts_in_message'))
                        <div style="padding: 10px">
                            <div class="alert bg-warning alert-warning text-white"  role="alert">
                                {{session('too_many_parts_in_message')}}
                            </div>
                        </div>
                    @endif
                    @if(session('not_has_money'))
                        <div style="padding: 10px">
                            <div class="alert bg-warning alert-warning text-white"  role="alert">
                                {{session('not_has_money')}}
                            </div>
                        </div>
                    @endif
                    @if(!Auth::user()->checkUpSendSms())
                        <div style="padding: 10px">
                            <div class="alert bg-warning alert-warning text-white"  role="alert">
                                Нужно пополнить счет!!
                            </div>
                        </div>
                    @endif

                <div class="card-header"><h3>Одиночное SMS</h3></div>
                <div class="card-body">
                    <form class="forms-sample" method="post" action="{{route('send.single.send')}}">
                        @csrf
                        <div class="form-group">
                            @error('originator')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                            <label for="exampleSelectGender">Имя отправителя</label>
                            <select class="form-control" name="originator">
                                <option>Shop Zakaz</option>
                                @if(isset($originators) && !empty($originators))
                                    @foreach($originators->get() as $item)
                                        <option>{{$item->originator}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group">

                            @error('phone')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                            <label for="exampleInputPassword4">Номер</label>
                            <input type="text" class="form-control" name="phone" placeholder="Номер получателя">
                        </div>

                        <div class="form-group">
                            @error('text')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                            <label for="exampleTextarea1">Текст смс</label>
                            <textarea class="form-control" id="textMessage" name="text" rows="4"></textarea>
                        </div>
                        <p>Колличество символов :

                        <strong id="count"></strong>
                        </p>
                        @if(Auth::user()->checkUpSendSms())
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light" type="button" id="test">Cancel</button>
                        @endif
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

