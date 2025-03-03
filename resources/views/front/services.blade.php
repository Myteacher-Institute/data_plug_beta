@extends('layouts.user')

@section('content')
    <!-- ==========================main================================= -->
<div class="main">
    <div class="topbar">
      <div class="toggle">
          <i class="fa fa-navicon"></i>
      </div>
      {{-- div class="search">
          <label class="label">
              <input type="text" placeholder="search here" id="search">
              <i class="fa fa-search"></i>
          </label>
      </> --}}
          <div class="user-img">

                    {{-- <div onclick="return confirm('Are you sure to logout?')">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                         <span class="icon">
                                            <i class="fa fa-arrow-right-from-bracket v1"></i>
                                            </span>
                                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div> --}}
          
              {{-- <img src="assset/img/SmartCity_connect_900.jpg" id="photo">
              <input type="file" id="file" accept="image/png, image/jpeg, image/gif" required/>
              <label for="file" id="uploadbtn"><i class="fas fa-camera"></i></label> --}}
          </div>
      </div> 
          
          <div class="card" style="overflow-x: auto;">
            <table>
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
                    @foreach ($service_request as $item)
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
                        <td><button style="background-color: blue; color: white; padding: 5px;">Update</button></td>
                        <td><button style="background-color: green; color: white; padding: 5px;">Check Result</button></td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
  </div>
@endsection

































{{-- <div class="sup-item">
    <img src="assset/img/download (1).png" alt="">
    <h3 class="h3">SME DATA</h3>
    <a href="#" class="a">Service Available</a>
    <p class="sup-details">Verify people using provide Bank verification Number</p>
    <div class="use-btn">
        <a href="#" class="amount-btn">Use Services</a>
        <span class="span"><i class=" fa fa-naira-sign so"></i>150</span>
    </div>
</div>
<div class="sup-item">
    <img src="assset/img/download (1).png" alt="">
    <h3 class="h3">Electricity Payment</h3> 
    <a href="#" class="a al">Service Available</a>
    <p class="sup-details">Verify Voters identification Number (VIN Number)</p>
    <div class="use-btn">
        <a href="#" class="amount-btn">Use Services</a>
        <span class="span"><i class=" fa fa-naira-sign so"></i>150</span>
    </div>
</div>
<div class="sup-item">
    <img src="assset/img/download (1).png" alt="">
    <h3 class="h3">PayBills</h3> 
    <p class="sup-details">Jamb Services</p>
    <div class="use-btn">
        <a href="#" class="amount-btn">Use Services</a>
    </div>
</div>
<div class="sup-item">
    <img src="assset/img/download (1).png" alt="">
    <h3 class="h3">Tin verification</h3> 
    <p class="sup-details">Verify tax identification Number (TIN Number)</p>
    <div class="use-btn">
        <a href="/tin" class="amount-btn">Use Services</a>
    </div> --}}