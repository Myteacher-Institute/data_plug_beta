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
                      <p>Request</p>
                  </div>
              </div>

              <div class="card">
                @foreach ($service_request as $item)
                  <div class="sup-item">
                    <img src="assset/img/download (1).png" alt="">
                    <h3 class="h3">{{ Str::title($item->service_type) }} Request</h3> 
                    <p class="sup-details">Update your request or download the result</p>
                    <p class="sup-details"><i>Created At: </i> {{ $item->created_at->format('d-m-Y') }}</p>
                    <div class="use-btn">
                        <a href="{{ url('update-request/'.$item->id) }}" class="amount-btn">Update</a>
                        <br>
                        @php
                            $enter_result = App\Models\EnterResult::where('request_id', $item->id)->where('user_id', Auth::user()->user_id)->first();
                        @endphp
                        <a href="{{ $enter_result->link ?? 'None' }}" style="background: green" class="amount-btn" download>Download</a>
                    </div>
                </div>
                @endforeach
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
