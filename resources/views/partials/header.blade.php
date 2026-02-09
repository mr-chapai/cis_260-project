<nav class="navbar navbar-expand-lg bg-primary m-0">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('icon-img/logo_horizontal.png') }}" alt="logo" width="100" height="40" >
            </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/dashboard">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                <button class="btn " type="submit"><img src="{{ asset('icon-img/magnifyingglass.svg') }}" alt="Icon" width="fluid" height="40" class="me-2">
                </button>
            </form>

            <button class="btn  ms-2" name="user" type="submit" formaction="login">
                <a href="/login">
                <img src="{{ asset('icon-img/user_icom.svg') }}" alt="Icon" width="fluid" height="30" class="me-2">
                </a>
            </button>

            <button class="btn  ms-2">
                <a href="/cart">
                <img src="{{ asset('icon-img/cart-icon.svg') }}" alt="Icon" width="fluid" height="30" class="me-2">
                </a>
            </button>

        </div>
    </div>
</nav>
