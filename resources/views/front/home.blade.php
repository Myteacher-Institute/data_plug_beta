@extends('layouts.user')

@section('content')
    <!-- ==========================main================================= -->
<div class="main">
    <div class="topbar">
      <div class="toggle">
          <i class="fa fa-navicon"></i>
      </div>
      {{-- <div class="search">
          <label class="label">
              <input type="text" placeholder="search here" id="search">
              <i class="fa fa-search"></i>
          </label>
      </div> --}}
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
          <div class="container-body">
              <div class="home">
                  <i class="fas fa-home" aria-hidden="true"></i>
                  <p>Home</p>
              </div>
              <div class="user-info">
                  <div class="user-details">
                      <i class="fa fa-user"></i>
                      <p>user details</p>
                      <h1 class="username">{{ Auth::user()->name }}</h1>
                      <h5 class="user_id">user id: {{ Auth::user()->user_id }}</h5>
                  </div>
                  <div class="user-details simple">
                      <div class="we-chat">
                          <i class="fa fa-wechat nw" aria-hidden="true"></i>
                      </div>
                      <a href="{{ url('payment') }}" class="bmb">Fund Wallet</a>
                      <div class="mtd">
                        <h2><i class="fas fa-naira-sign"></i> {{ Auth::user()->balance }}</h2>
                      </div>
                  </div>
              </div>
          </div>

          <div class="card">
            @if (session('error'))
                <script>
                    // alert('{{ session('error') }}')
                    swal("error!", "{{ session('error') }}", "error");
                </script>
            @endif
            @if (session('message'))
            <script>
                // alert('{{ session('error') }}')
                swal("successful!", "{{ session('message') }}", "success");
            </script>
        @endif
              <div class="sup-item">
                <img src="assset/img/download (1).png" alt="">
                <h3 class="h3">NIN Services</h3> 
                <p class="sup-details">Modify or Retrieve your NIN</p>
                <div class="use-btn">
                    <select class="nin" name="">
                        <option value="">--select--</option>
                        @foreach ($nin_services as $item)
                            <option value="{{ $item->slug }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="sup-item">
                <img src="assset/img/download (1).png" alt="">
                <h3 class="h3">Buy Data</h3> 
                <p class="sup-details">Purchase your data plans at the cheapest rates...</p>
                <div class="use-btn">
                    <a href="{{ url('buy_item/data') }}" class="amount-btn">Continue</a>
                </div>
            </div>
            <div class="sup-item">
                <img src="assset/img/download (1).png" alt="">
                <h3 class="h3">Buy Airtime</h3> 
                <p class="sup-details">Purchase your airtime fast and convenient...</p>
                <div class="use-btn">
                    <a href="{{ url('buy_item/airtime') }}" class="amount-btn">Continue</a>
                </div>
            </div>

            {{-- this path is for testimony section take note --}}
            @php
                $settings = App\Models\Settings::where('id',1)->first();
            @endphp
            <div class="sup-item">
                <img src="assset/img/download (1).png" alt="">
                <h3 class="h3">Explane how {{ $settings->website_title }}</h3> 
                <p class="sup-details">Tell other users your benefit or what it have help you accomplish partnering with us</p>
                <div class="use-btn">
                    <a href="{{ url('testify') }}" class="amount-btn">Continue</a>
                </div>
            </div>

        </div>
  </div>


  <script>
    //let ninSelect = document.querySelector('.nin');
    //let ninOptions = ninSelect.querySelectorAll('option');
    //var ninSelect = $(this).val();

    $(document).ready(function() {
        $(".nin").change(function() {
            var ninSelect = $(this).val();

            $.ajax({
                url: "nin-services",
                type: "GET",
                data: {
                    value: ninSelect,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.redirect_url) {
                        window.location.href = response.redirect_url;
                    }
                },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
            });
        });
    });

  </script>
@endsection
