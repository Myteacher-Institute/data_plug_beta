<!-- ====================================navigation================================================ -->
<div class="navigation">
    <div class="wallet">
        <p class="wallet-balance-title">Wallet Balance</p>
        <h2 id="input-amount"><i class="fas fa-naira-sign" aria-hidden="true"></i>{{ Auth::user()->balance }}</h2>
    </div>

    <ul>
        <li>
            <a href={{ url('home') }}>
                <span class="icon">
                <i class="fa fa-pie-chart v1"></i>
                </span>
                <span class="title">Dashboard</span>
            </a>
        </li>

        <li>
            <a href={{ url('services') }}>
                <span class="icon">
                <i class="fa fa-border-all v1"></i>
                </span>
                <span class="title">Services</span>
            </a>
        </li>

        <li>
            <a href={{ url('payment') }}>
                <span class="icon">
                <i class="fa fa-wallet v1"></i>
                </span>
                <span class="title">Payments</span>
            </a>
        </li>

        <li>
            <a href={{ url('transactions') }}>
                <span class="icon">
                <i class="fa fa-exchange v1"></i>
                </span>
                <span class="title">Transactions</span>
            </a>
        </li>

        <li>
            <a href="{{ url('help') }}">
                <span class="icon">
                <i class="fa fa-question v1"></i>
                </span>
                <span class="title">Help</span>
            </a>
        </li>

        <li>
            <a href={{ url('settings') }}>
                <span class="icon">
                <i class="fa fa-user v1"></i>
                </span>
                <span class="title">Profile</span>
            </a>
        </li>

        <li onclick="return confirm('Are you sure to logout?')">
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          <span class="icon">
                             <i class="fa fa-arrow-right-from-bracket v1"></i>
                             </span>
                             <span class="title">Logout</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>