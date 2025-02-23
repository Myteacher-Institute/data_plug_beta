@extends('layouts.master')

@section('content')
    
    <section id="interface">
        <div class="navigation">
            <div class="n1">
                <div>
                    <img src="icons/bars.svg" id="menu-btn" alt="" class="icons">
                </div>
                <div class="search">
                    <img src="icons/search.svg" alt="" class="icons">
                    <input type="text" placeholder="Search">
                </div>
            </div>
            <div class="profile">
                <img src="icons/bell.svg" alt="" class="icons">
                <img src="img/person-1.jpg" alt="" class="profile-pic">
            </div>
        </div>

        <h3 class="i-name">Services</h3>

        @if (session('message'))
            <script>
                alert('{{ session('message') }}');
            </script>
        @endif

        <div class="board">
            <h5 style="padding: 10px">NIN Services</h5>
            <span style="float: right; font-size: 14px; margin-right: 50px;">
                <a href="{{ url('admin/add-service') }}">Add New</a>
            </span>
            <table width="100%">
                <thead>
                        <td>Name</td>
                        <td>Details</td>
                        <td>Amount</td>
                        <td></td>
                        <td></td>
                </thead>
                <tbody>
                    @foreach ($services as $item)
                    <tr>
                        <td class="people">
                            <div class="people-de">
                                <h5>{{ $item->name }}</h5>
                            </div>
                        </td>
                        <td class="people-des">
                            <h5>{{ $item->details }}</h5>
                        </td>
                        <td class="people-des">
                            <h5>{{ $item->amount }}</h5>
                        </td>
                        <td class="role">
                            <a href="{{ url('admin/edit-service/'.$item->id) }}">Edit</a>
                        </td>
                        <td class="role" onclick="return confirm('Are you sure to delete this service?')">
                            <form action="{{ url('admin/delete-service/'.$item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="cursor: pointer;">Delete</button>
                            </form>
                        </td>
                        <td class="role">
                            <a href="admin/view-service-requests">View Requests</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

@endsection
 
