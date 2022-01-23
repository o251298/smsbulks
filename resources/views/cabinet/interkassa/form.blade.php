@extends('layouts.master')
@section('title', "Оплата")
@section('content')
    <form method="POST" action="https://www.liqpay.ua/api/3/checkout" accept-charset="utf-8">
        <input type="hidden" name="data" value="{{$data}}"/>
        <input type="hidden" name="signature" value="{{$signature}}"/>
        <input type="image" src="//static.liqpay.ua/buttons/p1ru.radius.png"/>
    </form>
@endsection
