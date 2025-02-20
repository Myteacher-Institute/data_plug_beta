@extends('layouts.user')

@section('content')
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

          <div>
            <div class="home">
                <i class="fas fa-id-card" aria-hidden="true"></i>
                <p>NIN {{ $value }}</p>
            </div>

            @if ($value == "retrieval")
            @include('includes/nin-retrieving')

            @elseif ($value == "modification")
            @include('includes/nin-modification')
            @else
                <h3 style="color: red">Invalida Request</h3>
            @endif
            
          </div>
</div>

@endsection
