<div class="collapse" id="MobNav">
    <div class="goodup-dashboard-nav sticky-top">
        <div class="goodup-dashboard-inner">
            <ul data-submenu-title="Main Navigation">
                <li class="@active('dashboard')">
                    <a href="{{ route('dashboard') }}">
                        <i class="lni lni-dashboard me-2"></i>Dashboard
                    </a>
                </li>
                <li class="@active('category_list')">
                    <a href="{{ route('category_list') }}">
                        <i class="lni lni-files me-2"></i>Category
                    </a>
                </li>
                <li class="@active('listing-data.index')">
                    <a href="{{ route('listing-data.index') }}">
                        <i class="lni lni-files me-2"></i>My Listings
                    </a>
                </li>
                <li class="@active('listing-data.create')">
                    <a href="{{ route('listing-data.create') }}">
                        <i class="lni lni-add-files me-2"></i>Add Listing
                    </a>
                </li>
                <li class="@active('reviews.index')">
                    <a href="{{ route('reviews.index') }}">
                        <i class="lni lni-star me-2"></i>Reviews
                    </a>
                </li>
            </ul>
            <ul data-submenu-title="My Accounts">
                <li class="@active('profile')">
                    <a href="{{ route('profile') }}">
                        <i class="lni lni-user me-2"></i>My Profile
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}">
                        <i class="lni lni-power-switch me-2"></i>Log Out
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
