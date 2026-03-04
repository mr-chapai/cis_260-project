<nav class="navbar myheader navbar-expand-lg ps-2 bg-black  bg-opacity-100 mb-0" >
    <div class="container-fluid g-0">
        <a class="navbar-brand" href="/">
            <img class="border border-white" src="{{ asset('icon-img/icons-white/logo_banner.png') }}" alt="logo"
                 width="flued" height="40">
        </a>
        <a class="navbar-brand text-white " href="/"></a>
        <button class="navbar-toggler bg-light-subtle" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto  mb-lg-0 text-white">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="/index" {{ request()->routeIs('index') ? 'active' : '' }}>Home</a>
                </li>

                @if(session('auth_user') && session('auth_user')['role'] === 'admin')
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="/product">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="/user">Users</a>
                </li>
                @endif
            </ul>
            <form class="w-50 d-flex " role="search">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search"/>
                <button class="btn " type="submit"><img src="{{ asset('icon-img/icons-white/magnifyingglass.png') }}"
                                                        alt="Icon" width="fluid" height="20" class="me-2">

                </button>
            </form>

            <button class="btn  ms-2" name="user" type="submit" formaction="login">


                @if(session('auth_user'))
                <a href="/logout"><img src="{{ asset('icon-img/icons-white/log-out.png') }}" alt="Icon" width="fluid"
                                       height="30"
                                       class="me-2"></a>
                @endif
                    @if(!session('auth_user'))
                <a href="{{Route('login.form')}}">
                    <img src="{{ asset('icon-img/icons-white/user.png') }}" alt="Icon" width="fluid"
                         height="30"
                         class="me-2"></a>
                @endif

            </button>
            {{--<button type="button" class="btn btn-primary position-relative">
                Mails <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-secondary">+99 <span class="visually-hidden">unread messages</span></span>

            </button>--}}

            {{-- <button class="btn  ms-2">
                 <a href="/cart">
                     <img src="{{ asset('icon-img/icons-white/cart.png') }}" alt="Icon" width="fluid" height="30"
                          class="me-2">
                 </a>
             </button>--}}

            <button type="button" class="btn position-relative">
                <a href="/cart">
                    <img src="{{ asset('icon-img/icons-white/cart.png') }}" alt="Icon" width="fluid" height="30"
                         class="me-2">

                    <span
                        class=" position-absolute top-50 start-0 translate-middle badge rounded-pill text-danger text-bg-success bg-opacity-75">
                        @php
                            if(session()->has('cart_item_count')) {
                               echo(session('cart_item_count'));
                          }



                        @endphp
                    </span>
                </a>
            </button>
        </div>
    </div>
</nav>

