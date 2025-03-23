@extends('layouts.master')

@section('content')
    
<section id="interface">
    <div class="navigation">
        <div class="n1">
            <div>
                <img src="{{ asset('admin/icons/bars.svg') }}" id="menu-btn" alt="" class="icons">
            </div>
            <div class="search">
                <img src="{{ asset('admin/icons/search.svg') }}" alt="" class="icons">
                <input type="text" placeholder="Search">
            </div>
        </div>
        <div class="profile">
            <img src="{{ asset('admin/icons/bell.svg') }}" alt="" class="icons">
            <img src="{{ asset('admin/img/person-1.jpg') }}" alt="" class="profile-pic">
        </div>
    </div>

        <h3 class="i-name">Update Request Result</h3>
        @if (session('message'))
        <script>
            alert('{{ session('message') }}')
        </script>
        @endif

        <p style="margin-left: 30px;"><a href="{{ url('admin/services') }}">Back</a></p>

        <div class="values">
            <form action="{{ url('admin/view-service-requests/update-result') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" name="request_id" value="{{ $service_request->id }}">

                <div class="form">
                    <div class="input-container ic1" style="margin-bottom: 50px">
                        <input id="link" name="link" class="input" type="text" placeholder=" " />
                        <label for="link" >PDF Link</label>
                    </div>
                    <button type="submit" class="submit">Update</button>
                </div>
            </form>


            {{-- this is the section i added settings or CMS for adding  help post--}}
        </div>

    </section>

@endsection
 
