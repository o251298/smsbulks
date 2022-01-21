<?php
use Illuminate\Support\Facades\Auth;
?>

@extends('layouts.master')
@section('title', "Регистрация АИ")
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
                @if(session('sql_error'))
                    <div style="padding: 10px">
                        <div class="alert bg-warning alert-warning text-white"  role="alert">
                            {{session('sql_error')}}
                        </div>
                    </div>
                @endif
                <div class="card-header"><h3>Создание АИ</h3></div>
                <div class="card-body">
                    <form class="forms-sample" method="post" action="{{route('originator.store')}}">
                        @csrf
                        <div class="form-group">
                            @error('originator')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                            <label for="exampleSelectGender">Имя отправителя</label>
                            <input type="text" class="form-control" name="originator" placeholder="Ваше АИ">
                        </div>
                            <button type="submit" class="btn btn-primary mr-2">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
        @if(isset($originators) && !empty($originators))
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Альфа имя</th>
                            <th scope="col">Статус</th>
                            <th scope="col">Дата подачи заявки</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($originators as $item)
                        <tr>
                            <td>{{$item->originator}}</td>
                            <td>
                                <span class="badge rounded-pill bg-{{$item->getStatus()['label']}} text-dark">{{$item->getStatus()['status']}}</span>
                            </td>
                            <td>{{$item->created_at}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection

