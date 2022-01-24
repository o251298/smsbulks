@extends('admin.layout.master')
@section('title', 'Оплаты')
@section('content')
    <h4>Оплаты</h4>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Логин</th>
            <th scope="col">Кошелек</th>
            <th scope="col">Статус</th>
            <th scope="col">Сума платежа</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($payments as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td style="font-size: 15px">{{$item->user()->first()['name']}}</td>
                <td style="font-size: 15px">На счету: <strong>{{$item->wallet()->first()['current_sum']}} UAH</strong></td>
                <td style="font-size: 15px">
                    <span class="badge bg-{{$item->getStatus()['lable']}}">{{$item->getStatus()['status']}}</span>
                </td>
                <td style="font-size: 15px">{{$item->sum}} {{$item->currency}}</td>
                @if($item->getStatus()['status'] !== "paymed")
                    <td style="font-size: 15px">
                        <form action="{{route('admin.wallet.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="description" value="payments_packet">
                            <input type="hidden" name="payment_id" value="{{$item->id}}">
                            <input type="hidden" name="total_sum" value="{{$item->sum}}">
                            <input type="hidden" name="user_id" value="{{$item->user()->first()['id']}}">
                            <input type="submit" value="Пополнить кошилек">
                        </form>
                    </td>
                    @else
                    <td style="font-size: 15px">
                        <span class="badge bg-success">Кошилек пополнен</span>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
