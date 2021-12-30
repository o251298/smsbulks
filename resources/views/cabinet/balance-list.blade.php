<?php
use App\Models\Message;
?>
@extends('layouts.master')
@section('content')
        @if(isset($balances))
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
                                    <th>Описание</th>
                                    <th>Сума на пакете</th>
                                    <th>Создания пакета</th>
                                    <th>Действие для пакета</th>
                                    <th>Статус</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($balances as $balance)
                                    <tr>
                                        <th scope="row">{{$balance->id}}</th>
                                        <td>{{$balance->description}}</td>
                                        <td>{{$balance->current_sum}}</td>
                                        <td>{{$balance->created_at}}</td>
                                        @if($balance->current_sum < Message::PRICE)
                                            <td>
                                                <a class="btn-danger" href="{{route('balance.destroy', $balance->id)}}">Деактивировать</a>
                                            </td>
                                        @else
                                            <td><a href="#" class="btn btn-secondary">Деактивировать</a></td>

                                        @endif
                                        @if($balance->id == \Illuminate\Support\Facades\Auth::user()->getBalance()->id)
                                            <td>
                                                <button type="button" class="btn btn-success">Активный</button>
                                            </td>
                                        @else
                                            <td>
                                                <button type="button" class="btn btn-danger">Неактивный</button>
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

