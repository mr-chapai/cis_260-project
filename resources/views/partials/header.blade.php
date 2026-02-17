
<nav class="navbar navbar-expand-lg m-0 bg-black p-2 bg-opacity-100">
    <div class="container-fluid">
        <a class="navbar-brand" href="/index">
            <img  class="border border-white p-2" src="{{ asset('icon-img/icons-white/logo_banner.png') }}" alt="logo" width="flued" height="40">
        </a>
        <a class="navbar-brand text-white" href="/dashboard"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="/index">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="/dashboard">Dashboard</a>
                </li>

            </ul>
            <form class="w-50 d-flex " role="search">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search"/>
                <button class="btn " type="submit"><img src="{{ asset('icon-img/icons-all/magnifyingglass.svg') }}"
                                                        alt="Icon" width="fluid" height="30" class="me-2">

                </button>
            </form>

            <button class="btn  ms-2" name="user" type="submit" formaction="login">

                    <a href="/logout"><img src="{{ asset('icon-img/icons-white/log-out.png') }}" alt="Icon" width="fluid" height="30"
                             class="me-2"></a>

                    <a href="/login"><img src="{{ asset('icon-img/icons-white/user.png') }}" alt="Icon" width="fluid" height="30"
                             class="me-2"></a>



            </button>

            <button class="btn  ms-2">
                <a href="/cart">
                    <img src="{{ asset('icon-img/icons-white/cart.png') }}" alt="Icon" width="fluid" height="30" class="me-2">
                </a>
            </button>
        </div>
    </div>
</nav>

