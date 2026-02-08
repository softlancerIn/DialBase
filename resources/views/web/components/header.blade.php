<div class="header header-light dark-text">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="{{route('index')}}">
                    <img src="{{asset('assets/img/logo.png')}}" class="logo" alt="" />
                </a>
                <div class="nav-toggle"></div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">
                <a class="nav-brand-1" href="{{route('index')}}">
                    <img src="{{asset('assets/img/logo.png')}}" class="logo" alt="" />
                </a>
                <ul class="nav-menu nav-menu-social align-to-right">
                    <li>
                        <a href="{{route('login')}}" data-bs-toggle="modal" data-bs-target="#login" class="ft-bold">
                            <i class="fas fa-sign-in-alt me-1 theme-cl"></i>Sign In
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
