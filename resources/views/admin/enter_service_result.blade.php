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

        <h3 class="i-name">Add Request Result</h3>
        @if (session('message'))
        <script>
            alert('{{ session('message') }}')
        </script>
        @endif

        <p style="margin-left: 30px;"><a href="{{ url('admin/services') }}">Back</a></p>

        <div class="values">
            <form action="{{ url('admin/view-service-requests/enter-result') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="request_id" value="{{ $service_request->id }}">

                <div class="form">
                    <div class="input-container ic1" style="margin-bottom: 50px">
                        <input id="file" name="file" class="input" type="file" placeholder=" " />
                        <label for="file" >Upload File</label> 
                    </div>
                    <div class="input-container ic1" style="margin-bottom: 50px">
                        <input id="link" name="link" class="input" type="text" placeholder=" " />
                        <label for="link" >PDF Link</label>
                    </div>
                    <div class="input-container ic2" style="margin-bottom: 50px">
                        <div class="input-container ic2" style="margin-bottom: 30px">
                        <textarea id="details" name="details" class="input" cols="40" rows="25"></textarea>
                        <label for="details" >Notes <i>(if any)</i></>
                    </div>
                    <button type="submit" class="submit">Save</button>
                </div>
            </form>


            {{-- this is the section i added settings or CMS for adding  help post--}}
        </div>

    </section>

@endsection
 
