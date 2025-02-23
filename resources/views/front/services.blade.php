@extends('layouts.user')

@section('content')
    <!-- ==========================main================================= -->
<div class="main">
    <div class="topbar">
      <div class="toggle">
          <i class="fa fa-navicon"></i>
      </div>
      <{{-- div class="search">
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
          
          <div class="card">
              <div class="sup-item">
                  <img src="assset/img/download (1).png" alt="">
                  <h3 class="h3">NIN verification</h3> 
                  <p class="sup-details">Verify people using their National identity Number</p>
                  <div class="use-btn">
                      <a href="#" class="amount-btn">Use Services</a>
                  </div>
              </div>
              <div class="sup-item">
                  <img src="assset/img/download (1).png" alt="">
                  <h3 class="h3">Mobile DATA</h3> 
                  <p class="sup-details">Verify people using provide Bank verification Number</p>
                  <div class="use-btn">
                      <a href="#" class="amount-btn">Use Services</a>
                  </div>
              </div>
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