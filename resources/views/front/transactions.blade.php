@extends('layouts.user')

<<<<<<< HEAD
@section('content')   
=======
@section('content')
@php
    $pay = App\Models\Payments::where('id', Auth::user()->id)->get();

    $tranc_data = App\Models\Transactions::selectRaw('DATE(created_at) as date, SUM(amount) as total')  
        ->groupBy('date')  
        ->orderBy('date')  
        ->get();
@endphp
>>>>>>> ffe36f1345642de874abe1aeaacce09846d49b40
<div class="main">
    <div class="topbar">
      <div class="toggle">
          <i class="fa fa-navicon"></i>
      </div>
<<<<<<< HEAD
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
      <br><br><br><div>
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
=======
      {{-- <div class="search">
          <label class="label">
              <input type="text" placeholder="search here" id="search">
              <i class="fa fa-search"></i>
          </label>
      </div> --}}
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

    <div class="transaction">
        <div class="card-trac">
            <div class="card-header">Transaction Data<i class="fas fa-chart-line fa-2x"></i></div>
            <div class="card-body">
                <div id="chart">
                    <canvas id="myChart" style="max-width: 100%"></canvas>
                </div>
                <div class="chart">
                  <h1 class="transaction-details-txt">Transaction details</h1>
                  <div class="chart-title">Average Amount Paid per Day</div>
                  <div class="chart-subtitle">Total Amount Paid: {{ $pay->sum('amount_paid') }}</div>
                  {{-- <div class="chart-subtitle">Average: {{ $pay->sum('amount_paid') / $pay->count() }}</div> --}}
                  <div class="chart-subtitle">Average: {{ $pay->avg('amount_paid') }}</div>
                </div>
                <div id="chart">
                  <canvas id="pieChart" style="max-width: 100%"></canvas>
                  {{-- <canvas id="transactionChart" width="400" height="200"></canvas>    --}}
                </div>
                <div id="trac_link_table">
                  <a href="{{ url('/view_transaction_table') }}">Transaction History</a>
                </div>
              </div>
            </div>
          </div>
          
          {{-- <p id="tr">{{ $tranc_data }}</p> --}}
          {{-- @foreach ($transactions as $item)
          @if (!$transactions)
          <p>error</p>
          @endif
          <p>{{ $item->sum('amount') }}</p>
          @endforeach --}}

    </div>
</div>


{{-- <input id="pay" name="logo" value="{{ $pay->amount_paid }}" class="input" type="hidden" placeholder=" " /> --}}
{{-- <input id="time" name="logo" value="{{ now()->format('YmdHi') }}" class="input" type="hidden" placeholder=" " /> --}}



{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const pay = document.getElementById('pay').value;
    const avergOfAmount = pay / 2;
    const time = document.getElementById('pay').value;
    const avergOfTime = time / 24;

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Amount', 'Average_time', 'aver_payments'],
        datasets: [{
          label: 'Transaction',
          data: [pay, avergOfTime, avergOfAmount],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
</script> --}}
@endsection
>>>>>>> ffe36f1345642de874abe1aeaacce09846d49b40
