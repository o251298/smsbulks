<?php
use Illuminate\Support\Facades\Auth;
?>
@extends('layouts.master')
@section('content')
    @if(Auth::user()->api_token != null)
        <div class="card" style="background: #1a1e21">
            <div class="card-header" style="color: #4ABF60; font-size: 15px; font-weight: bold">
                Bear token
            </div>
            <div class="card-body">
                <p class="card-text" style="color: #4ABF60; font-weight: lighter">{{Auth::user()->api_token}}</p>
            </div>
        </div>
    @endif
<div class="card">
    <h5 class="card-header">Отправка смс</h5>
        <div class="card-body">
        <h5 class="card-title">Адрес службы</h5>
            <div class="card" style="background: #0b0b0b; color: #4ABF60; font-size:17px">
                <div class="card-body">
                    https://smsbulks.ru/api/message-send
                </div>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Request</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Response</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="background: #1a202c; height: 300px; color: #cad900">
                    <pre style="color: #1dc116; margin-left: -150px">
                    {
                        "originator" : "Shop Zakaz",
                        "text": "test smsbulks api test2",
                        "phone": "380962540183"
                    }
                    </pre>
                </div>

                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="background: #1a202c; height: 300px;color: #cad900">
                    <pre style="color: #1dc116; margin-left: -150px">
                    {
                        "status": "success",
                            "info": {
                            "message_id": 65,
                            "current_balance": 3.5
                        }
                    }
                    </pre>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
@endsection

