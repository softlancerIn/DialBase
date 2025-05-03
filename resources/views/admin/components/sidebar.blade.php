@php
    $active = 'dashboard';
    if (request()->routeIs('listing-data.index')) {
        $active = 'listing-index';
    } elseif (request()->routeIs('listing-data.create')) {
        $active = 'listing-create';
    } elseif (request()->routeIs('listing-data.edit')) {
        $active = 'listing';
    } elseif (request()->routeIs('profile')) {
        $active = 'profile';
    }
@endphp
<div class="collapse" id="MobNav">
    <div class="goodup-dashboard-nav sticky-top">
        <div class="goodup-dashboard-inner">
            <ul data-submenu-title="Main Navigation">
                <li class="{{$active == 'adminDashboard' ? 'active' : ''}}"><a href="dashboard.html"><i
                            class="lni lni-dashboard me-2"></i>Dashboard</a></li>
                <li class="{{$active == 'category' ? 'active' : ''}}"><a href="{{route('listing-data.index')}}"><i
                            class="lni lni-files me-2"></i>Category</a>
                </li>
                <li class="{{$active == 'listing-index' ? 'active' : ''}}"><a href="{{route('listing-data.index')}}"><i
                            class="lni lni-files me-2"></i>My Listings</a>
                </li>
                <li class="{{$active == 'listing-create' ? 'active' : ''}}"><a
                        href="{{route('listing-data.create')}}"><i class="lni lni-add-files me-2"></i>Add
                        Listing</a></li>
                {{-- <li><a href="dashboard-saved-listings.html"><i class="lni lni-bookmark me-2"></i>Saved
                        Listing</a></li>
                <li><a href="dashboard-my-bookings.html"><i class="lni lni-briefcase me-2"></i>My
                        Bookings<span class="count-tag bg-warning">4</span></a></li>
                <li><a href="dashboard-wallet.html"><i class="lni lni-mastercard me-2"></i>Wallet</a></li>
                <li><a href="dashboard-messages.html"><i class="lni lni-envelope me-2"></i>Messages<span
                            class="count-tag">4</span></a></li> --}}
            </ul>
            <ul data-submenu-title="My Accounts">
                <li class="{{$active == 'profile' ? 'active' : ''}}"><a href="{{route('profile')}}"><i
                            class="lni lni-user me-2"></i>My Profile </a>
                </li>
                {{-- <li><a href="dashboard-change-password.html"><i class="lni lni-lock-alt me-2"></i>Change
                        Password</a></li>
                <li><a href="javascript:void(0);"><i class="lni lni-trash-can me-2"></i>Delete Account</a> --}}
                </li>
                <li><a href="{{route('logout')}}"><i class="lni lni-power-switch me-2"></i>Log Out</a></li>
            </ul>
        </div>
    </div>
</div>
