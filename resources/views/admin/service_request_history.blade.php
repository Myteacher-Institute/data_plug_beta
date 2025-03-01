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

        <h3 class="i-name">Service Request</h3>

        <p style="margin-left: 30px;"><a href="javascript:history.back()">Back</a></p>

        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <th>Service Type</th>   
                        <th>Firstname</th>
                        <th>Middlename</th>
                        <th>Lastname</th>
                        <th>DOB</th>
                        <th>Email</th>
                        <th>NIN Number</th>
                        <th>Tracking ID</th>
                        <th>Phone Number</th>
                        <th>Whatsapp Number</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($service_requests as $item)
                    <tr>
                        <td>{{ $item->service_type }}</td>
                        <td>
                            {{ $item->firstname}}<br><br>
                            <small>New Firstname: </small>{{ $item->new_firstname != null ? $item->new_firstname : ''}} 
                        </td>
                        <td>
                            {{ $item->middlename}}<br><br>
                            <small>New Middlename: </small>{{ $item->new_middlename != null ? $item->new_middlename : ''}} 
                        </td>
                        <td>
                            {{ $item->lastname}}<br><br>
                            <small>New Lastname: </small>{{ $item->new_lastname != null ? $item->new_lastname : ''}} 
                        </td>
                        <td>
                            {{ $item->dob}}<br><br>
                            <small>New dob: </small>{{ $item->new_dob != null ? $item->new_dob : ''}} 
                        </td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->nin_number }}</td>
                        <td>{{ $item->tracking_id != null ? $item->tracking_id : ''}}</td>
                        <td>{{ $item->phone_number }}</td>
                        <td>{{ $item->whatsapp_number }}</td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                    <tr style="margin-bottom: 50px">
                        <td></td>
                        <td id="myBtn">
                            <a href="#" style="background-color: darkblue; color: white; text-decoration: none; padding: 5px; cursor: pointer;" id="delete-btn">
                                Update   Result
                            </a>
                            <div id="myModal" class="modal">

                                @php
                                    $result = App\Models\EnterResult::where('request_id',$item->id)->first();
                                @endphp
                                <!-- Modal content -->
                                <form action="">
                                    <div class="modal-content">
                                        <span id="close" class="close">&times;</span>
                                        <div class="values">
                                            <form action="{{ url('admin/view-service-requests/update-result') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                
                                                <input type="hidden" name="request_id" value="{{ $item->id }}">
                                
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
                                                    <button type="submit" class="submit">Update</button>
                                                </div>
                                            </form>
                                
                                
                                            {{-- this is the section i added settings or CMS for adding  help post--}}
                                        </div>
                                      </div>
                                </form>
                              
                              </div>
                        </td>
                        <td id="myBtn1">
                            <a href="#" style="background-color: green; color: white; text-decoration: none; padding: 5px; cursor: pointer;" id="delete-btn">
                                View   Result
                            </a>
                            <div id="myModal1" class="modal">

                                @php
                                    $result = App\Models\EnterResult::where('request_id',$item->id)->first();
                                @endphp
                                <!-- Modal content -->
                                <div class="modal-content">
                                  <span id="close1" class="close">&times;</span>
                                  <div>
                                    <a href="{{ asset('uploads/'.$result->file) }}" download="">Download PDF</a>
                                  </div><br>

                                  <div>
                                    PDF Link: {{ $result->link == "" ? "Empty" : $result->link }}
                                  </div><br>

                                  <div>
                                    Notes: {{ $result->notes == "" ? "Empty" : $result->notes }}
                                  </div><br>
                                </div>
                              
                              </div>
                        </td>

                    </tr>
                    @empty
                    <h3 style="color: red; text-align: center;">No Request Available</h3>  
                    @endforelse
                
                </tbody>
            </table>
        </div>

        </div>
    </section>

@endsection
 
