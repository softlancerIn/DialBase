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
                <li class="@active('blog_list')">
                    <a href="{{ route('blog_list') }}">
                        <i class="lni lni-files me-2"></i>Blogs
                    </a>
                </li>
                <li class="@active('seo_list')">
                    <a href="{{ route('seo_list') }}">
                        <i class="lni lni-target me-2"></i>SEO
                    </a>
                </li>
                <li class="@active('reviews.index')">
                    <a href="{{ route('reviews.index') }}">
                        <i class="lni lni-star me-2"></i>Reviews
                    </a>
                </li>
                <li class="@active('enquiry_list')">
                    <a href="{{ route('enquiry_list') }}">
                        <i class="lni lni-files me-2"></i>Enquiry
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
