@extends('layouts.user')

@section('content')
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
          
<div>

            @if (session('error'))
                <script>
                    alert('{{ session('error') }}')
                </script>
            @endif
            @if (session('message')) 
                <script>
                    alert('{{ session('message') }}')
                </script>
            @endif
            
            <div class="home">
                <i class="fas fa-money-bill-1" aria-hidden="true"></i>
                <p>Update Request</p>
            </div>

            <div class="nin-m">
            
                {{-- i suggest that this place should be for payment form before the user proceed with nin retriving form --}}
            
                <div class="nin-md-form">
                    <form action="{{ url('store-update-request/'.$service_request->id) }}" method="POST">
                        @csrf
                        @method('PUT')
            
                        <div class="nin-rt-form-group">
                            <input type="text" id="nin" name="firstname" value="{{ $service_request->firstname }}" placeholder="Enter your NIN firstname"><br>
                            <input type="text" id="nin" name="new_firstname" value="{{ $service_request->new_firstname != null ? $service_request->new_firstname : ''}}" placeholder="Enter your new firstname">
                        </div>
            
                        <div class="nin-rt-form-group">
                            <input type="text" id="nin" name="middlename" value="{{ $service_request->middlename }}" placeholder="Enter your NIN middlename">
                            <input type="text" id="nin" name="new_middlename" value="{{ $service_request->new_middlename != null ? $service_request->new_middlename : ''}}" placeholder="Enter your new middlename">
                        </div>
                
                        <div class="nin-rt-form-group">
                            <input type="text" id="nin" name="lastname" value="{{ $service_request->lastname }}" placeholder="Enter your NIN lastname"><br>
                            <input type="text" id="nin" name="new_lastname" value="{{ $service_request->new_lastname != null ? $service_request->new_lastname : ''}}" placeholder="Enter your new lastname">
                        </div>
             
                        <div class="nin-rt-form-group">
                            <input type="date" id="nin" name="dob" value="{{ $service_request->dob }}" placeholder="Enter your date of birth"> <i>(Enter DOB)</i><br>
                            <input type="date" id="nin" name="new_dob" value="{{ $service_request->new_dob != null ? $service_request->new_dob : ''}}" placeholder="Enter your new date of birth"> <i>(Enter New DOB)</i>
                        </div>
            
                        <div class="nin-rt-form-group">
                            <input type="email" id="nin" name="email" value="{{ $service_request->email }}" placeholder="Enter your email address">
                        </div>
                
                        <div class="nin-rt-form-group">
                            <input type="text" id="nin" name="nin_number" value="{{ $service_request->nin_number }}" placeholder="Enter your nin number">
                        </div>

                        <div class="nin-rt-form-group">
                            <input type="text" id="nin" name="tracking_id" value="{{ $service_request->tracking_id != null ? $service_request->tracking_id : ''}}" placeholder="Enter your tracking ID">
                        </div>
                
                        <div class="nin-rt-form-group">
                            <input type="text" id="nin" name="phone_number" value="{{ $service_request->phone_number }}" placeholder="Enter your phone number">
                        </div>
                
                        <div class="nin-rt-form-group">
                            <input type="text" id="nin" name="whatsapp_number" value="{{ $service_request->whatsapp_number }}" placeholder="Enter your whatsapp number"> <i>(To get result)</i>
                        </div>

                        <div class="nin-rt-form-group-btn">
                            <button type="submit" id="send-nin">Submit</button>
                        </div>
            
                    </form>
            
                    
                {{-- this will be the success message after the form has been submitted --}}
            
                <br>
                <p>Updating a request is only done within the first hour!</p>
                </div>
            </div>

        </div>
</div
@endsection