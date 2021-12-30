@extends('layouts.master')
@section('content')
    @if(isset($groups) && !empty($groups))
        <div class="row">
            <div class="col-md-6">
                <div class="card">

                    <div class="card-header d-block">
                        <h3>Базы номеров</h3>
                    </div>
                    <div class="card-body p-0 table-border-style">
                        <div class="table-responsive">
                            <table class="table table-inverse">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Кол-во номеров</th>

                                </tr>
                                </thead>
                                <tbody>
                                @php($i = 1)
                                @foreach($groups as $group)
                                    <tr>
                                        <th scope="row">{{$i}}</th>
                                        <td>
                                            <a href="{{route('groups.view', $group->id)}}">{{$group->name}}</a>
                                        </td>
                                        <td>{{count($group->numbers()->get())}}</td>

                                    </tr>
                                    @php($i++)
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

