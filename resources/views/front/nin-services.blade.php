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
                <i class="fas fa-money-bill-1" aria-hidden="true"></i>
                <p>NIN {{ $value }}</p>
            </div>

            @if ($value == "retrieval")
            <form method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form">
                    <div class="input-container ic1" style="margin-bottom: 50px">
                    <input id="amount" name="amount" class="input" type="text" style="color: black;"/><br>
                    <label for="amount" >Enter Amount <i class="fas fa-coins"></i></label>

                    </div>

                    <button type="submit" class="submit">Continue</button>
                </div>
            </form>

            @elseif ($value == "modification")
            <form method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form">
                    <div class="input-container ic1" style="margin-bottom: 50px">
                    <input id="amount" name="amount" class="input" type="text" style="color: black;"/><br>
                    <label for="amount" >Enter Amount <i class="fas fa-coins"></i></label>

                    </div>

                    <button type="submit" class="submit">Continue</button>
                </div>
            </form>
            @else
                <h3 style="color: red">Invalida Request</h3>
            @endif
            
          </div>
</div>

@endsection
