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

        <h3 class="i-name">Transactions</h3>

        <div class="board">
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
    
          <div class="board">
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
    </section>

@endsection
 
