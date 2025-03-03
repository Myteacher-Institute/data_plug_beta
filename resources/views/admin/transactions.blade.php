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
            <table width="100%">
                <thead>
                        <td>Request ID</td>
                        <td>User ID</td>
                        <td>Details</td>
                        <td>Phone</td>
                        <td>Amount</td>
                        <td>Type</td>
                        <td>Status</td> 
                        <td>Created At</td>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        
                    <tr>
                        <td class="people">
                            <div class="people-de">
                                <h5>{{ $transaction->request_id }}</h5>
                            </div>
                        </td>
                        <td class="role">
                            <h5>{{ $transaction->user_id }}</h5>
                        </td>
                        <td class="people-des">
                            <h5>{{ $transaction->product_name }}</h5>
                            <p>N{{ $transaction->amount }}</p>
                        </td>
                        <td class="role">
                            <h5>{{ $transaction->phone }}</h5>
                        </td>
                        <td class="role">
                            <h5>{{ $transaction->amount }}</h5>
                        </td>
                        <td class="role">
                            <h5>{{ $transaction->type }}</h5>
                        </td>
                        <td class="role">
                            <h5>{{ $transaction->status == 1 ? "Delivered" : "Not Delivered" }}</h5>
                        </td>
                        <td class="role">
                            <h5>{{ $transaction->created_at }}</h5>
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
    
            </div>

            <div class="cal" style="padding: 30px">
                <div class="total-amount">the total amount of money: {{ $sum }}</div>
                <div class="averg">the average: {{ $average }}</div>
                <div class="percentage">Percentage of Transactions: {{ $percentage }}%</div>
                <div>amount used with mtn {{ $mtn_sum }}</div>
            </div>
        </div>
    </section>

@endsection
 
