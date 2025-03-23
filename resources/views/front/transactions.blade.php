@extends('layouts.user')


@section('content')   
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

    <div class="container-body">
      <div class="home">
          <i class="fas fa-exchange" aria-hidden="true"></i>
          <p> Transactions</p>
      </div>
      <div>
        <h3>Requests</h3><br>
        <table>
          <thead>
            <th>Service Type</th>
            <th>Name</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Created At</th>
          </thead>

        <tbody class="tb">

            @foreach ($nin_service_requests as $nin_service_request)
              <tr>
                <td>{{ Str::title($nin_service_request->service_type) }}</td>
                <td>{{ $nin_service_request->firstname.' '.$nin_service_request->lastname }}</td>
                <td>N{{ $nin_service_request->amount }}</td>
                <td>{{ $nin_service_request->status == 1 ? "Deliverd" : "Not Delivered" }} </td>
                <td>{{ $nin_service_request->created_at }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <br><br><br>

      <div>
        <h3>Payments</h3><br>
        <table>
          <thead>
            <th>Transaction Ref.</th>
            <th>Name</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Created At</th>
          </thead>
          <tbody>
            @foreach ($payments as $payment)
              <tr>
                <td>{{ Str::title($payment->tx_ref) }}</td>
                <td>{{ $payment->name }}</td>
                <td>N{{ $payment->amount_paid }}</td>
                <td>{{ $payment->status == 1 ? "Deliverd" : "Not Delivered" }} </td>
                <td>{{ $payment->created_at }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
@endsection

<style>

</style>