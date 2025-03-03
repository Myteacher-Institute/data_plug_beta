@extends('layouts.master')

@section('content')
    
    <section id="interface">
        <div class="navigation">
            <div class="n1">
                <div>
                    <img src="{{ asset('admin/icons/bars.svg') }}" id="menu-btn" alt="" class="icons">
                </div>
                <div class="search">
                    <img src="{{ asset('admin/icons/search.svg') }}" alt="" class="icons">
                    <input type="text" placeholder="Search">
                </div>
            </div>
            <div class="profile">
                <img src="{{ asset('admin/icons/bell.svg') }}" alt="" class="icons">
                <img src="{{ asset('admin/img/person-1.jpg') }}" alt="" class="profile-pic">
            </div>
        </div>

        <h3 class="i-name">Dashboard</h3>

        <div class="values">
            <div class="val-box" onclick="window.location.href='users'" style="cursor: pointer;">
                <img src="{{ asset('admin/icons/users1.svg') }}" alt="" class="icons">
                <div>
                    <h3>{{ $users }}</h3>
                    <span>Total Users</span>
                </div>
            </div>
            <div class="val-box" onclick="window.location.href='services'" style="cursor: pointer;">
                <img src="{{ asset('admin/icons/request.svg') }}" alt="" class="icons">
                <div>
                    <h3>{{ $nin_services }}</h3>
                    <span>Total Services</span>
                </div>
            </div>
            <div class="val-box" onclick="window.location.href='transactions'" style="cursor: pointer;">
                <img src="{{ asset('admin/icons/cart.svg') }}" alt="" class="icons">
                <div>
                    <h3>{{ $nin_service_requests }}</h3>
                    <span>Total Requests</span>
                </div>
            </div>
            <div class="val-box"onclick="window.location.href='transactions'" style="cursor: pointer;">
                <img src="{{ asset('admin/icons/dollar-sign.svg') }}" alt="" class="icons">
                <div>
                    <h3>{{ $transactions }}</h3>
                    <span>Total Transactions</span>
                </div>
            </div>
        </div>

        
    </section>

@endsection
 
