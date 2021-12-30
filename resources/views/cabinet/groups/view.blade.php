@extends('layouts.master')
@section('content')
    @if(isset($numbers) && !empty($numbers))
        <div class="row">
            <div class="col-md-6">
                <div class="card">

                    <div class="card-header d-block">
                        <h3>База номеров : <strong>{{$group->name}}</strong> </h3>
                    </div>
                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <table class="table table-inverse">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Номер</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i = 1)
                                @foreach($numbers as $number)
                                    <tr>
                                        <th scope="row">{{$i}}</th>
                                        <td>{{$number->number}}</td>
                                        @php($i++)
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

