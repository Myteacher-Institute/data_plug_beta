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

        <h3 class="i-name">Settings</h3>
        @if (session('message'))
        <script>
            alert('{{ session('message') }}')
        </script>
        @endif

        <div class="values">
            <form action="{{ url('admin/settings') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form">
                    <div class="input-container ic1" style="margin-bottom: 50px">
                    <input id="title" name="title" @if ($settings) value="{{ $settings->website_title }}" @endif class="input" type="text" placeholder=" " />
                    <label for="title" >Website Title</label>
                    </div>
                    <div class="input-container ic2" style="margin-bottom: 50px">
                        @if ($settings)
                            <label for="">Current Logo: </label>
                            <img src="{{ asset('uploads/'.$settings->logo) }}" width="100px" alt=""><br><br>
                        @endif
                        <input id="logo" name="logo" class="input" type="file" placeholder=" " />
                        <label for="logo" >Logo</label>
                    </div><br><br><br><br>
                    <div class="input-container ic2" style="margin-bottom: 50px">
                        @if ($settings)
                            <label for="">Current Favicon: </label>
                            <img src="{{ asset('uploads/'.$settings->favicon) }}" width="100px" alt=""><br><br>
                        @endif
                        <input id="favicon" name="favicon"  class="input" type="file" placeholder=" " />
                        <label for="favicon" >Favicon</label>
                    </div><br><br><br><br>
                    @if ($settings)
                    <div class="input-container ic2" style="margin-bottom: 50px">
                        <input id="keywords" name="keywords" value="{{ $settings->keywords}}" class="input" type="text" placeholder=" " />
                        <label for="keywords" >Keywords</label>
                        </div>
                        <div class="input-container ic2" style="margin-bottom: 30px">
                        <textarea id="description" name="description" class="input" cols="40" rows="15">{{ $settings->description }}</textarea>
                        <label for="description" >Description</>
                        </div>
                    @else
                    <div class="input-container ic2" style="margin-bottom: 50px">
                        <input id="keywords" name="keywords" value="" class="input" type="text" placeholder=" " />
                        <label for="keywords" >Keywords</label>
                        </div>
                        <div class="input-container ic2" style="margin-bottom: 30px">
                        <textarea id="description" name="description" class="input" cols="40" rows="15"></textarea>
                        <label for="description" >Description</>
                        </div>
                    @endif
                    <button type="submit" class="submit">Save</button>
                </div>
            </form>


            {{-- this is the section i added settings or CMS for adding  help post--}}
        </div>

        <details style="margin-top: 500px;padding: 40px 40px" id="complete">
            <summary>Delete Help</summary>
            <p>Delete a help post by entering the category of the post you want to delete.</p>
        <div class="values">
            <form action="{{ url('admin/delete_help') }}" method="POST">
                @csrf
                @method('delete')
                <h1>Delete Help</h1>
                <div class="form">
                    <div class="input-container ic1" style="margin-bottom: 50px">
                        <input type="text" name="category" class="input" placeholder="Enter help content category" required>
                        <label for="category">Category</label>
                    </div>
                    <button type="submit" class="submit">Delete</button>
                </div>
            </form>
        </div>
        </details>

        <details style="padding: 40px 40px" id="complete">
            <summary>Help</summary>
        <div class="values">
                <form action="{{ url('admin/add_help') }}" method="POST" enctype="multipart/form-data">
                    <h1 style="color: rgb(18, 18, 59)">Add help</h1>
                    @csrf
    
                    <div class="form">
                        <div class="input-container ic1" style="margin-bottom: 50px">
                        <input id="title" name="category" value="" class="input" type="text" placeholder=" " />
                        <label for="title" >Category</label>
                        </div>
                        <div class="input-container ic2" style="margin-bottom: 30px">
                        <textarea id="description" name="content" class="input" cols="100" rows="15"></textarea>
                        <label for="description" >Content</label>
                        </div>
                        <div class="input-container ic2" style="margin-bottom: 50px">
                            {{-- @if ($settings)
                                <label for="">Current Logo: </label>
                                <img src="{{ asset('uploads/'.$settings->logo) }}" width="100px" alt=""><br><br>
                            @endif --}}
                            <input id="logo" name="help_video" class="input" type="file" placeholder=" " />
                            <label for="logo" >Help video</label>
                        </div><br>
                        <div class="input-container ic2" style="margin-bottom: 50px">
                            {{-- @if ($settings)
                                <label for="">Current Favicon: </label>
                                <img src="{{ asset('uploads/'.$settings->favicon) }}" width="100px" alt=""><br><br>
                            @endif --}}
                            <input id="favicon" name="help_img"  class="input" type="file" placeholder=" " />
                            <label for="favicon" >Help image</label>
                            <button type="submit" class="submit">Save</button>
                        </div>
                    </div>
                </form>
                <ul id="help-delete-btn">
                    @foreach ($helps as $item)
                    {{-- <form action="/" method="POST"> --}}
                        {{-- @csrf --}}
                        {{-- @method('DELETE') --}}
                        <li>{{ $item->category }}</li>
    
                    {{-- </form> --}}
                    @endforeach
                </ul>
                </details>
        </div>

    </section>

@endsection
 
