@extends('layouts.user')

@section('content')
    <!-- ==========================main================================= -->
<div class="main">
    <div class="topbar">
      <div class="toggle">
          <i class="fa fa-navicon"></i>
      </div>


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
          
        <div class="card">
              @if ($item == "data") 
              <form action="{{ url('buy-data') }}" method="POST">
                    @csrf

                    <div class="form">
                        <div class="input-container ic1" style="margin-bottom: 50px">
                        <input id="amount" name="amount" class="input" type="text" style="color: black;"/><br>
                        <label for="amount" >Enter Amount <i class="fas fa-coins"></i></label>

                        </div>

                        <button type="submit" class="submit">Continue</button>
                    </div>
                </form>           

              @elseif($item == "airtime")

              @if (session('message')) 
                <script>
                    alert('{{ session('message') }}');
                </script>
              @endif

              <form action="{{ url('buy-airtime') }}" method="POST">
                    @csrf

                        <div class="form">
                            <div class="input-container ic1" style="margin-bottom: 50px">
                            <input id="amount" name="amount" class="input" type="text" style="color: black;"/><br>
                            <label for="amount" >Enter Amount <i class="fas fa-coins"></i></label>

                        </div>

                        <div class="input-container ic1" style="margin-bottom: 50px">
                            <input id="phone" name="phone" class="input" type="text" style="color: black;"/><br>
                            <label for="phone" >Enter Phone <i class="fas fa-coins"></i></label>
    
                        </div>

                        <div class="input-container ic1" style="margin-bottom: 50px">
                            <select name="operator" id="">
                                <option value="">--Choose an Operator</option>
                                <option value="1">MTN</option>
                                <option value="4">Airtel</option>
                                <option value="2">Glo</option>
                                <option value="3">9mobile</option>
                            </select>
    
                        </div>

                        <button type="submit" class="submit">Continue</button>
                    </div>
                </form>

              @endif        
        </div>
@endsection