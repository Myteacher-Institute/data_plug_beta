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

        <h3 class="i-name">Service Request</h3>

        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <th>Service Type</th>   
                        <th>Firstname</th>
                        <th>Middlename</th>
                        <th>Lastname</th>
                        <th>DOB</th>
                        <th>Email</th>
                        <th>NIN Number</th>
                        <th>Tracking ID</th>
                        <th>Phone Number</th>
                        <th>Whatsapp Number</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($service_requests as $item)
                <tr>
                    <td>{{ Str::upper($item->service_type) }}</td>
                    <td>
                        {{ $item->firstname}}<br><br>
                        <small>New Firstname: </small>{{ $item->new_firstname != null ? $item->new_firstname : ''}} 
                    </td>
                    <td>
                        {{ $item->middlename}}<br><br>
                        <small>New Middlename: </small>{{ $item->new_middlename != null ? $item->new_middlename : ''}} 
                    </td>
                    <td>
                        {{ $item->lastname}}<br><br>
                        <small>New Lastname: </small>{{ $item->new_lastname != null ? $item->new_lastname : ''}} 
                    </td>
                    <td>
                        {{ $item->dob}}<br><br>
                        <small>New dob: </small>{{ $item->new_dob != null ? $item->new_dob : ''}} 
                    </td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->nin_number }}</td>
                    <td>{{ $item->tracking_id != null ? $item->tracking_id : ''}}</td>
                    <td>{{ $item->phone_number }}</td>
                    <td>{{ $item->whatsapp_number }}</td>
                </tr>
                <tr style="margin-bottom: 50px">
                    <td></td>
                    <td><button style="background-color: green; color: white; padding: 5px;">Enter   Result</button></td>
                </tr>
                @endforeach

                </tbody>
            </table>
    
            </div>

        </div>
    </section>

@endsection
 
