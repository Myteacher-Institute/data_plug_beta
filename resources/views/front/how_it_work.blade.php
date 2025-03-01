@extends('layouts.otherpages')
@section('content')
<h1 class="how-head">
    How It Works
    </h1>
<div class="master">
<div class="how">

        <div class="explianation">
            <details class="det" data-text="Pay Bills">
                <summary>Pay Bills</summary>
                <a href="#pay-bills-1" class="exp-text">section 1</a>
                <a href="#pay-bills-2" class="exp-text">section 2</a>
                <a href="#pay-bills-3" class="exp-text">section 3</a>
            </details>
            <details class="det" data-text="Buy Airtime">
                <summary>Buy Airtime</summary>
                <a href="#buy-airtime-1" class="exp-text">section 1</a>
                <a href="#buy-airtime-1" class="exp-text">section 2</a>
                <a href="#buy-airtime-3" class="exp-text">section 3</a>
            </details>
            <details class="det" data-text="Buy Data">
                <summary>Buy Data</summary>
                <a href="#buy-data-1" class="exp-text">section 1</a>
                <a href="#buy-data-2" class="exp-text">section 2</a>
                <a href="#buy-data-3" class="exp-text">section 3</a>
            </details>
            <details class="det" data-text="View account details">
                <summary>View account details</summary>
                <a href="#view-acc-1" class="exp-text">section 1</a>
                <a href="#view-acc-2" class="exp-text">section 2</a>
                <a href="#view-acc-3" class="exp-text">section 3</a>
            </details>
            <details class="det" data-text="view account transactions">
                <summary>view account transactions</summary>
                <a href="#view-acc-tra-1" class="exp-text">section 1</a>
                <a href="#view-acc-tra-2" class="exp-text">section 2</a>
                <a href="#view-acc-tra-3" class="exp-text">section 3</a>
            </details>
        </div>

    </div>
    <div class="how-content">
        <div class="how-ans">
            <div class="category-help">Pay bills <i class="fa-solid fa-money-check"></i></div>
            <div id="pay-bills-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore beatae ea porro laudantium praesentium sunt facere mollitia delectus, perferendis vel voluptates aliquam necessitatibus illo? Aspernatur fuga reprehenderit inventore adipisci culpa?</div>
            <div id="pay-bills-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, magnam. Temporibus facere minus neque accusamus inventore provident, voluptatibus numquam excepturi eveniet possimus eius ad explicabo quos quo. Commodi odio dicta, vitae pariatur obcaecati assumenda, eaque deleniti quos ea dolorum minus.</div>
            <div id="pay-bills-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis, sint commodi libero officiis sapiente tempora?</div>
            <a href="{{ url('/payment') }}" target="_blank">View page</a>
        </div>

        <div class="how-ans">
            <div class="category-help">Buy airtime <i class="fas fa-phone-volume"></i></div>
            <div id="buy-airtime-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore beatae ea porro laudantium praesentium sunt facere mollitia delectus, perferendis vel voluptates aliquam necessitatibus illo? Aspernatur fuga reprehenderit inventore adipisci culpa?</div>
            <div id="buy-airtime-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, magnam. Temporibus facere minus neque accusamus inventore provident, voluptatibus numquam excepturi eveniet possimus eius ad explicabo quos quo. Commodi odio dicta, vitae pariatur obcaecati assumenda, eaque deleniti quos ea dolorum minus.</div>
            <div id="buy-airtime-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis, sint commodi libero officiis sapiente tempora?</div>
            <a href="{{ url("/payment") }}" target="_blank">View page</a>
        </div>

        <div class="how-ans">
            <div class="category-help">Buy data <i class="fas fa-phone-flip"></i></div>
            <div id="buy-data-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore beatae ea porro laudantium praesentium sunt facere mollitia delectus, perferendis vel voluptates aliquam necessitatibus illo? Aspernatur fuga reprehenderit inventore adipisci culpa?</div>
            <div id="buy-data-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, magnam. Temporibus facere minus neque accusamus inventore provident, voluptatibus numquam excepturi eveniet possimus eius ad explicabo quos quo. Commodi odio dicta, vitae pariatur obcaecati assumenda, eaque deleniti quos ea dolorum minus.</div>
            <div id="buy-data-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis, sint commodi libero officiis sapiente tempora?</div>
            <a href="{{ url("/payment") }}" target="_blank">View page</a>
        </div>

        <div class="how-ans">
            <div class="category-help">View account <i class="fa-solid fa-money-check"></i></div>
            <div id="view-acc-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore beatae ea porro laudantium praesentium sunt facere mollitia delectus, perferendis vel voluptates aliquam necessitatibus illo? Aspernatur fuga reprehenderit inventore adipisci culpa?</div>
            <div id="view-acc-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, magnam. Temporibus facere minus neque accusamus inventore provident, voluptatibus numquam excepturi eveniet possimus eius ad explicabo quos quo. Commodi odio dicta, vitae pariatur obcaecati assumenda, eaque deleniti quos ea dolorum minus.</div>
            <div id="view-acc-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis, sint commodi libero officiis sapiente tempora?</div>
            <a href="{{ url("/home") }}" target="_blank">View page</a>
        </div>

        <div class="how-ans">
            <div class="category-help">View account transactions <i class="fa-solid fa-money-bill-trend-up"></i><i class=""></i></div>
            <div id="view-acc-tra-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore beatae ea porro laudantium praesentium sunt facere mollitia delectus, perferendis vel voluptates aliquam necessitatibus illo? Aspernatur fuga reprehenderit inventore adipisci culpa?</div>
            <div id="view-acc-tra-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non, magnam. Temporibus facere minus neque accusamus inventore provident, voluptatibus numquam excepturi eveniet possimus eius ad explicabo quos quo. Commodi odio dicta, vitae pariatur obcaecati assumenda, eaque deleniti quos ea dolorum minus.</div>
            <div id="view-acc-tra-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis, sint commodi libero officiis sapiente tempora?</div>
            <a href="{{ url("/transactions") }}" target="_blank">View page</a>
        </div>
    </div>
</div>

@include('includes\footer')
@endsection
