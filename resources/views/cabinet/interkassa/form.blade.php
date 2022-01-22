@extends('layouts.master')
@section('title', "Оплата")
@section('content')
    <form id="payment" name="payment" method="POST" action="https://sci.interkassa.com/" enctype="utf-8">
        @csrf
        <input type="hidden" name="s" value="6ILrVnps4D" />
        <input type="text" name="ik_am"/>
        <input type="hidden" name="ik_cur" value="uah"/>
        <input type="submit" value="Pay">
    </form>
@endsection
