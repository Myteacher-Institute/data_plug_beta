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

        <h3 class="i-name">Service Request</h3>

        <p style="margin-left: 30px;"><a href="{{ url('admin/view-all-service-request-history/') }}">View History </a></p>

        @if (count($service_requests) > 0)
        <p style="margin-left: 30px;"><a href="{{ url('admin/view-service-request-history/'.$service_requests[0]->service_type) }}">View History</a></p>
        @endif

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
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($service_requests as $item)
                    <tr>
                        <td>{{ $item->service_type }}</td>
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
                        <td>{{ $item->created_at }}</td>
                    </tr>
                    <tr style="margin-bottom: 50px">
                        <td></td>
                        <td><a href="{{ url('admin/view-service-requests/'.$item->id.'/enter-result') }}" style="background-color: green; color: white; text-decoration: none; padding: 5px; cursor: pointer;" id="delete-btn">Enter   Result</a></td>
                    </tr>
                    @empty
                    <h3 style="color: red; text-align: center;">No Request Available</h3>  
                    @endforelse
            
                </tbody>
            </table>
        </div>

        </div>
    </section>

@endsection
 
