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

          <div>
            <div class="home">
                <i class="fas fa-money-bill-1" aria-hidden="true"></i>
                <p>Payment</p>
            </div>
            <form id="makePaymentForm" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form">
                    <div class="input-container ic1" style="margin-bottom: 50px">
                    <input id="amount" name="amount" class="input" type="text" style="color: black;" placeholder="Enter your amount"/><br>
                    <label for="amount" >Enter Amount <i class="fas fa-coins"></i></label>

                    <input id="user_id" name="user_id" value="{{ Auth::user()->user_id }}" class="input" type="hidden" placeholder=" " />
                    <input id="name" name="name" value="{{ Auth::user()->name }}" class="input" type="hidden" placeholder=" " />
                    <input id="email" name="email" value="{{ Auth::user()->email }}" class="input" type="hidden" placeholder=" " />
                    <input id="phone" name="phone" value="{{ Auth::user()->phone }}" class="input" type="hidden" placeholder=" " />
                    <input id="tx_ref" name="tx_ref" value="{{ time() }}" class="input" type="hidden" placeholder=" " />
                     @if ($settings)
                     <input id="title" name="title" value="{{ $settings->website_title }}" class="input" type="hidden" placeholder=" " />
                     <input id="logo" name="logo" value="{{ $settings->logo }}" class="input" type="hidden" placeholder=" " />
                     @else
                     <input id="title" name="title" value="" class="input" type="hidden" placeholder=" " />
                     <input id="logo" name="logo" value="" class="input" type="hidden" placeholder=" " />
                     @endif

                    </div>

                    <button type="submit" class="submit">Continue</button>
                </div>
            </form>
          </div>

          <div class="payment">
            <h1>You can 💵 update your Balance by putting your Amount then click the button</h1>
          </div>
</div>

<script src="https://checkout.flutterwave.com/v3.js"></script>
<script>

    var makePaymentForm = document.getElementById('makePaymentForm');

    makePaymentForm.addEventListener('submit', function (e) {
        e.preventDefault();

        var amount = document.getElementById('amount').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        var user_id = document.getElementById('user_id').value;
        var name = document.getElementById('name').value;
        var tx_ref = document.getElementById('tx_ref').value;
        var title = document.getElementById('title').value;
        var logo = document.getElementById('logo').value;

        makePayment(amount,user_id,tx_ref,email,phone,name,title,logo);

    });

    function makePayment(amount,user_id,tx_ref,email,phone,name,title,logo) {
        FlutterwaveCheckout({
            public_key: "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
            tx_ref,
            amount,
            currency: "NGN",
            payment_options: "card, mobilemoneyghana, ussd",
            redirect_url: "http://127.0.0.1:8000/make_payment",
            meta: {
            user_id,
            },
            customer: {
            email,
            phone,
            name,
            },
            customizations: {
            title: `${title} Services Limited`,
            description: "Deposit money into dashboard",
            logo: `http://127.0.0.1:8000/uploads/${logo}`,
            }
        });
}
</script>
@endsection
