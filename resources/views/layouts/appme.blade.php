<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Goldady</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>

<body>

    <main class=" d-flex">
        <div class="d-flex flex-column p-3 text-white bg-dark" style="height: 100vh">
            <span class="fs-4">Goldady</span>
            <hr>

            <ul class="nav nav-pills flex-column mb-auto">

                <li class="nav-item">
                    <a href="/home" class="btn btn-outline-info mb-3 w-100">Home</a>
                </li>
                <li class="nav-item">
                    <a href="/location" class="btn btn-primary mb-3 w-100" aria-current="page">
                        Location
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/treasury" class="btn btn-primary mb-3 w-100" aria-current="page">
                        Treasury
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/bar" class="btn btn-primary mb-3 w-100" aria-current="page">
                        Bar
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/gold" class="btn btn-primary mb-3 w-100" aria-current="page">
                        All Gold
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                @guest
                @if (Route::has('login'))
                <a href="{{ route('login') }}"> <button type="button"
                        class="btn btn-outline-light me-2">Login</button></a>
                @endif
                @if (Route::has('register'))
                <a href="{{ route('register') }}"><button type="button" class="btn btn-warning">Sign-up</button></a>
                @endif
                @else
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                @endguest
            </div>
        </div>
        </div>
        <div class=" container p-4">
            @yield('content')
        </div>

    </main>

    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>
