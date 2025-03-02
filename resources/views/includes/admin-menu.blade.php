<section id="menu">
    <div class="logo">
        @php
            $settings = App\Models\Settings::where('id',1)->first();
        @endphp
        <img @if ($settings) src={{  asset('uploads/'.$settings->logo) }}@endif alt="">
        <h2>Admin</h2>
    </div>
    <nav class="items">
        <li><a href="{{ url('admin/index') }}"><img src="{{ asset('admin/icons/chart.svg') }}" alt="" class="icons">Dashboard</a></li>
        <li><a href="{{ url('admin/users') }}"><img src="{{ asset('admin/icons/users.svg') }}" alt="" class="icons">Users</a></li>
        <li><a href="{{ url('admin/services') }}"><img src="{{ asset('admin/icons/form.svg') }}" alt="" class="icons">Services</a></li>
        <li><a href="{{ url('admin/transactions') }}"><img src="{{ asset('admin/icons/credit-card.svg') }}" alt="" class="icons">Transactions</a></li>
        <li><a href="{{ url('admin/api_manegement') }}"><img src="{{ asset('admin/icons/form.svg') }}" alt="" class="icons">API Management</a></li>
        <li><a href="{{ url('admin/profile') }}"><img src="{{ asset('admin/icons/table.svg') }}" alt="" class="icons">Profile</a></li>
        <li><a href="{{ url('admin/settings') }}"><img src="{{ asset('admin/icons/settings.svg') }}" alt="" class="icons">Settings</a></li>
        <li onclick="return confirm('Are you sure to logout?')">
            <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        <img src="icons/logout.svg" alt="" class="icons">Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
        </li>
    </nav>
</section>
