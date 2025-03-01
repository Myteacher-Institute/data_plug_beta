<!-- In resources/views/admin/api.blade.php -->
@extends('layouts\master')

@section('content')

<style>
    #api-table {
        width: 100%;
        border-collapse: collapse;
    }

    #api-table th, #api-table td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    #api-table th {
        background-color: #f2f2f2;
    }

    #api-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    #api-table tr:hover {
        background-color: #f5f5f5;
    }
</style>
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

<h3 class="i-name">Api manegement</h3>
<table id="api-table">
    <thead id="api-head">
        <tr>
            <th>Method</th>
            <th>URI</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="api-body">
        @foreach ($allRoutes as $route)
        <tr>
            <td>{{ $route['method'] }}</td>
            <td>{{ $route['uri'] }}</td>
            <td>{{ $route['name'] }}</td>
            <td>{{ $route['action'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</section>

@endsection
