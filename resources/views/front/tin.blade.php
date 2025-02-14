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

                    <div onclick="return confirm('Are you sure to logout?')">
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
                    </div>
          
              {{-- <img src="assset/img/SmartCity_connect_900.jpg" id="photo">
              <input type="file" id="file" accept="image/png, image/jpeg, image/gif" required/>
              <label for="file" id="uploadbtn"><i class="fas fa-camera"></i></label> --}}
          </div>
      </div>


<div class="task-box">
    <div class="t-head">
        <img src="{{ asset('assset/img/SmartCity_connect_900.jpg') }}" alt="">
    </div>
    <marquee direction="left">
        Task indentification number
    </marquee>

    @if (Auth::user()->balance > 500)
     <fieldset class="t-form">
        <legend>Task indentification number</legend>
     </fieldset>
    @else
    <dialog id="no-money">
       <h3 style="color: red;"><i class="fas fa-circle-exclamation"></i> account balance is low</h3>
       <button id="close-dialog">close</button>
    </dialog>
    @endif
</div>
@endsection
