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

        <h3 class="i-name">Edit Service</h3>
        @if (session('message'))
        <script>
            alert('{{ session('message') }}')
        </script>
        @endif

        <div class="values">
            <form action="{{ url('admin/edit-service/'.$service->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form">
                    <div class="input-container ic1" style="margin-bottom: 50px">
                        <input id="name" name="name" value="{{ $service->name }}" class="input" type="text" placeholder=" " />
                        <label for="name" >Service Name</label>
                    </div>
                    <div class="input-container ic2" style="margin-bottom: 50px">
                        <div class="input-container ic2" style="margin-bottom: 30px">
                        <textarea id="details" name="details" class="input" cols="40" rows="25">{{ $service->details }}</textarea>
                        <label for="details" >Details</>
                    </div>
                    <div class="input-container ic1" style="margin-bottom: 50px">
                        <input id="amount" name="amount" value="{{ $service->amount }}" class="input" type="text" placeholder=" " />
                        <label for="amount" >Amount</label> 
                    </div>
                    <button type="submit" class="submit">Update</button>
                </div>
            </form>


            {{-- this is the section i added settings or CMS for adding  help post--}}
        </div>

    </section>

@endsection
 
