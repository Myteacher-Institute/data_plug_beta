@extends('layouts.master')

@section('content')
    
    <section id="interface">
        <div class="navigation">
            <div class="n1">
                <div>
                    <img src="icons/bars.svg" id="menu-btn" alt="" class="icons">
                </div>
                <div class="search">
                    <img src="icons/search.svg" alt="" class="icons">
                    <input type="text" placeholder="Search">
                </div>
            </div>
            <div class="profile">
                <img src="icons/bell.svg" alt="" class="icons">
                <img src="img/person-1.jpg" alt="" class="profile-pic">
            </div>
        </div>

        <h3 class="i-name">Dashboard</h3>

        <div class="values">
            <div class="val-box" onclick="window.location.href='users'" style="cursor: pointer;">
                <img src="icons/users.svg" alt="" class="icons">
                <div>
                    <h3>{{ $users }}</h3>
                    <span>Total Users</span>
                </div>
            </div>
            <div class="val-box" onclick="window.location.href='services'" style="cursor: pointer;">
                <img src="icons/request.svg" alt="" class="icons">
                <div>
                    <h3>{{ $nin_services }}</h3>
                    <span>Total Services</span>
                </div>
            </div>
            <div class="val-box" onclick="window.location.href='transactions'" style="cursor: pointer;">
                <img src="icons/cart.svg" alt="" class="icons">
                <div>
                    <h3>{{ $nin_service_requests }}</h3>
                    <span>Total Requests</span>
                </div>
            </div>
            <div class="val-box"onclick="window.location.href='transactions'" style="cursor: pointer;">
                <img src="icons/dollar-sign.svg" alt="" class="icons">
                <div>
                    <h3>{{ $transactions }}</h3>
                    <span>Total Transactions</span>
                </div>
            </div>
        </div>

        
    </section>

@endsection
 
