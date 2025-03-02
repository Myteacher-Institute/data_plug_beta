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

        <h3 class="i-name">Users</h3>

        @if (session('message'))
            <script>
                alert('{{ session('message') }}');
            </script>
        @endif

        <div class="board">
            <table width="100%">
                <thead>
                        <td>Name</td>
                        <td>Details</td>
                        <td>Phone</td>
                        <td></td> 
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        
                    <tr>
                        <td class="people">
                            <img src="img/person-1.jpg" alt="">
                            <div class="people-de">
                                <h5>{{ $user->name }}</h5>
                                <p>{{ $user->email }}</p>
                            </div>
                        </td>
                        <td class="people-des">
                            <h5>{{ $user->user_id }}</h5>
                            <p>N{{ $user->balance }}</p>
                        </td>
                        <td class="role"> 
                            <p>{{ $user->phone }}</p>
                        </td>
                        <td onclick="return confirm('Are you sure to delete this user?')">
                            <form action="{{ url('admin/user-delete/'.$user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" style="cursor: pointer" id="delete-btn">Delete</button>
                            </form>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </section>

@endsection
 
