<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid d-flex" style="font-family: 'Courier New', Courier, monospace; ">

        <a class="navbar-brand" href="/">Jramedia </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Jika user login --}}
        @if (Auth::check())
            <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">

                <div class="nav-right-left me-3">
                    <ul class="navbar-nav mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link {{ $active === 'products' ? 'active' : '' }}" aria-current="page"
                                href="/products">View Products</a>
                        </li>

                        @can('user')
                            <li class="nav-item">
                                <a class="nav-link {{ $active === 'cart' ? 'active' : '' }}" href="/cart">View Cart</a>
                            </li>
                        @endcan

                        {{-- Jika user admin --}}
                        @can('admin')
                            <li class="nav-item">
                                <a class="nav-link {{ $active === 'transactions' ? 'active' : '' }}" href="/transactions">View
                                    All Transactions</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ $active === 'users' ? 'active' : '' }}" href="/users/">View Accounts</a>
                            </li>
                        @endcan

                    </ul>
                </div>

                <div class="nav-right-right d-flex">

                    <div class="nav-right-right-left me-4">
                        <form class="d-flex" style="width:19vw" action="/products/" method="get">
                            @csrf
                            <input type="hidden" value="{{ true }}" name ='isSearching'> 
                            <input class="form-control" type="search" placeholder="Search product here..."
                                aria-label="Search" name="search" value="{{ (request('search')) ? request('search') : "" }}">
                            
                            <button class="btn btn-outline-success " type="submit"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg></button>
                        </form>

                    </div>

                    <div class="nav-right-right-right">
                        <div class="collapse navbar-collapse me-5" id="navbarNavDarkDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown dropdown-menu-lg-end"">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Profile
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark "
                                        aria-labelledby="navbarDarkDropdownMenuLink">
                                        <li><a class="dropdown-item" href="#">{{ Auth::user() -> name }}</a></li>
                                        <li>
                                            <form action="/logout" method="post">
                                                @csrf
                                                <button type="submit" class="dropdown-item">
                                                    Logout
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>

            {{-- Jika user belum login --}}
        @else
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'login' ? 'active' : '' }}" aria-current="page" href="/login">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'register' ? 'active' : '' }}" href="/register">Register</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'about' ? 'active' : '' }}" href="/about">About Us</a>
                    </li>
                </ul>
            </div>
        @endif


</nav>
