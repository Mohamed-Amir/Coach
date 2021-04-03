<header class="header" style="background: #fff;">
    <a href="/" class="nav-btn">
        <span></span>
        <span></span>
        <span></span>
    </a>

    <div class="header-menu">
        <div class="container">
            <div class="header-logo">
                <a href="/" class="logo"><img src="/Fronted/img/logo.png" alt="logo"></a>
            </div>
            <nav class="nav-menu">
                <ul class="nav-list">
                    <li>
                        <a href="/">Home </a>
                    </li>

                    <li><a href="{{route('Packages.allPackages')}}">Packages</a></li>
                    <li><a href="{{route('General.contacts')}}">Contacts</a></li>
                    @if(Auth::check())
                        <li><a href="{{route('User.myProfile')}}"><i class="fas fa-user"></i> &nbsp;my profile</a></li>
                    @else
                        <li><a href="{{route('User.sign_in')}}"><i class="fas fa-user"></i> &nbsp;Sign In</a></li>
                        <li><a href="{{route('User.sign_up')}}"><i class="fas fa-user"></i> &nbsp;Sign up</a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</header>
