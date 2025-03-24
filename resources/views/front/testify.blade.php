@extends('layouts.user')

@section('content')
    <!-- ==========================main================================= -->
    <style>
        #dataForm{
            margin: 60px 30px;
        }
        .tes-content > textarea{
            width: 60%;
            height: 200px;
            padding: 30px;
            font-size: 2em
        }
    </style>
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
      @if (session('success'))
      <script>
          alert('{{ session('success') }}')
      </script>
      @endif
      @if (session('error'))
      <script>
          alert('{{ session('error') }}')
      </script>
      @endif

  </div>

  {{-- <script>
$(document).ready(function() {
        $('#dataForm').on('submit', function(e) {
            e.preventDefault(); // Prevent form from submitting normally

            $.ajax({
                url: "{{ route('add_testify') }}", // URL to send the request
                type: 'POST',
                data: $(this).serialize(), // Serialize form data
                success: function(response) {
                    $('#responseMessage').html('<p>' + response.success + '</p>'); // Show success message
                    $('#dataForm')[0].reset(); // Reset form
                    if (response.redirect_url) {
                        window.location.href = response.redirect_url;
                    }
                },
                error: function(xhr) {
                    // Handle errors
                    let errors = xhr.responseJSON.errors;
                    let errorMessages = '';
                    for (let key in errors) {
                        errorMessages += errors[key].join('<br>') + '<br>';
                    }
                    $('#responseMessage').html('<p style="color:red;">' + errorMessages + '</p>');
                }
            });
        });
    });
  </script> --}}
@endsection