@extends('layouts.user')

@section('content')
<div class="main" style="overflow: auto">
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
                        {{-- <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                         <span class="icon">
                                            <i class="fa fa-arrow-right-from-bracket v1"></i>
                                            </span>
                                            Logout
                        </a> --}}

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
          
              {{-- <img src="assset/img/SmartCity_connect_900.jpg" id="photo">
              <input type="file" id="file" accept="image/png, image/jpeg, image/gif" required/>
              <label for="file" id="uploadbtn"><i class="fas fa-camera"></i></label> --}}
          </div>
      </div>
          
          {{-- <div class="help"> --}}
            <div class="help-box">
                <div class="home">
                    <i class="fas fas fa-question" aria-hidden="true"></i>
                    <p>Help</p>
                </div>
                <div id="help-dropdown-wrapper">
                    @foreach ($helps as $help)
                    <div id="help-brodcast">
                        <h4>
                            {{ $help->category }}
                        </h4>
                        <div class="help-dropdown">
                            <p>{{$help->content }}</p>
                            @if ($help->img)
                            <video @if($help) src="{{ asset($help->video) }}" @endif controls loop autoplay></video>
                            <img @if($help) src="{{ asset($help->img) }}" @endif alt="help image">
                            @else
                                <p style="color: red;">No file found</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- <div id="help-dropdown-wrapper">
                    <details>
                        <summary>
                            view Amount details
                        </summary>
                        <div class="help-dropdown">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, non cupiditate culpa porro aliquam ad necessitatibus repellat incidunt rem laboriosam.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, non cupiditate culpa porro aliquam ad necessitatibus repellat incidunt rem laboriosam.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, non cupiditate culpa porro aliquam ad necessitatibus repellat incidunt rem laboriosam.</p>
                        </div>
                    </details>
                </div>

                <div id="help-dropdown-wrapper">
                    <details>
                        <summary>
                            view Amount details
                        </summary>
                        <div class="help-dropdown">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, non cupiditate culpa porro aliquam ad necessitatibus repellat incidunt rem laboriosam.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, non cupiditate culpa porro aliquam ad necessitatibus repellat incidunt rem laboriosam.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, non cupiditate culpa porro aliquam ad necessitatibus repellat incidunt rem laboriosam.</p>
                        </div>
                    </details>
                </div> --}}

            </div>
          {{-- </div> --}}
</div>
@endsection