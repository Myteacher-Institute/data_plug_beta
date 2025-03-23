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
            
            <form action="{{ url('update_details') }}" method="POST" id="profile-form">
                @csrf
                @method('PUT')

                    <div class="form">
                        <h2>Personal Information </h2>

                        <div class="input-container ic1" style="margin-bottom: 50px">
                        <input id="name" name="name" value="{{ Auth::user()->name }}" class="input" type="text" style="color: black;"/><br>
                        <label for="name" >Name</label>

                    </div>

                    <div class="input-container ic1" style="margin-bottom: 50px">
                        <input id="email" name="email" value="{{ Auth::user()->email }}" class="input" type="text" style="color: black;"/><br>
                        <label for="email" >Email</i></label>

                    </div>

                    <div class="input-container ic1" style="margin-bottom: 50px">
                        <input id="phone" name="phone" value="{{ Auth::user()->phone }}" class="input" type="text" style="color: black;"/><br>
                        <label for="phone" >Phone</label>

                    </div>

                    <button type="submit" class="submit">Update</button>
                </div>
            </form>

            <form action="{{ url('update_password') }}" method="POST" style="margin-left: 160px;" id="profile-form">
                @csrf
                @method('PUT')

                    <div class="form">
                        <h2>Change Password </h2>

                        <div class="input-container ic1" style="margin-bottom: 50px">
                        <input id="current_password" name="current_password" class="input" type="password" style="color: black;"/><br>
                        <label for="current_password" >Current Password</label>

                    </div>

                    <div class="input-container ic1" style="margin-bottom: 50px">
                        <input id="password" name="password" class="input" type="password" style="color: black;"/><br>
                        <label for="password" >New Password</i></label>

                    </div>

                    <div class="input-container ic1" style="margin-bottom: 50px">
                        <input id="password_confirmation" name="password_confirmation" class="input" type="password" style="color: black;"/><br>
                        <label for="password_confirmation" >Password Confirmation</label>

                    </div>

                    <button type="submit" class="submit">Update</button>
                </div>
            </form>
        </div>
</div
@endsection