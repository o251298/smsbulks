@extends('layouts.master')
@section('title', "Оплата")
@section('content')
    <div class="card" style="width: 28rem; background: none">
        <img src="https://www.interkassa.com/resource/images/brandbook/b-logo-horizontal.png" class="card-img-top" alt="...">
        <div class="card-body">
            <a href="{{route('payments.interkassa')}}" class="btn btn-primary">Оплатить</a>
        </div>
    </div>

{{--    <div class="card" style="width: 18rem;">--}}
{{--        <img src="..." class="card-img-top" alt="...">--}}
{{--        <div class="card-body">--}}
{{--            <h5 class="card-title">Card title</h5>--}}
{{--            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
{{--            <a href="#" class="btn btn-primary">Go somewhere</a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="card" style="width: 18rem;">--}}
{{--        <img src="..." class="card-img-top" alt="...">--}}
{{--        <div class="card-body">--}}
{{--            <h5 class="card-title">Card title</h5>--}}
{{--            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
{{--            <a href="#" class="btn btn-primary">Go somewhere</a>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
