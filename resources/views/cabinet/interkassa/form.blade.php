<?php
use Illuminate\Support\Facades\Auth;
?>
@extends('layouts.master')
@section('title', "Оплата Interkassa")
@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"><h3>Оплата через Interkassa</h3></div>
            <div class="card-body">
                <form id="payment" name="payment" method="POST" action="https://sci.interkassa.com/" enctype="utf-8" class="forms-sample">
                    <input type="hidden" name="ik_x_login" value="{{Auth::user()->email}}">
                    <input type="hidden" name="ik_x_id" value="{{Auth::id()}}">
                    <input type="hidden" name="ik_x_wallet" value="{{Auth::user()->getWallet()->first()['id']}}">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Сумма</label>
                        <input type="text" name="ik_am" class="form-control" placeholder="Введите сумму для оплаты">
                        <input type="hidden" name="ik_cur" value="UAH">
                    </div>
                    <input type="hidden" name="ik_co_id" value="61e9731eeaa2517dd276a598">
                    <input type="hidden" name="s" value="RULYVo0fPX">
                    <input type="submit" class="form-control" value="Оплатить">
                </form>
            </div>
        </div>
    </div>
@endsection
