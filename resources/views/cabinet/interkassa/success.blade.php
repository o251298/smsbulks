@extends('layouts.master')
@section('title', "Оплата успешна")
@section('content')
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Успех!</h4>
        <p>Уважаемый {{\Illuminate\Support\Facades\Auth::user()->email}}</p>
        <hr>
        <p class="mb-0">Оплата прошла успешно</p>
    </div>
@endsection
