<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/home" class="nav-link px-2 text-white ">Home</a></li>
                </ul>
                <div class="text-end">
                    @guest
                        @if (Route::has('login'))

                        <a href="{{ route('login') }}">  <button type="button" class="btn btn-outline-light me-2">Login</button></a>

                        @endif

                        @if (Route::has('register'))

                        <a href="{{ route('register') }}"><button type="button" class="btn btn-warning">Sign-up</button></a>

                        @endif
                        @else
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
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
    </header>
    <main class="d-flex">
      <div class="d-flex flex-column p-3 text-white bg-dark">
        <span class="fs-4">Goldady</span>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="/location" class="btn btn-primary mb-3 w-100" aria-current="page">
                    Location
                </a>
            <li class="nav-item">
                <a href="/gold" class="btn btn-primary mb-3 w-100" aria-current="page">
                    Gold
                </a>
          </li>
          <li class="nav-item">
            <a href="/bar" class="btn btn-primary mb-3 w-100" aria-current="page">
              Bar
            </a>
          </li><li class="nav-item">
            <a href="/treasury" class="btn btn-primary mb-3 w-100" aria-current="page">
              Treasury
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class=" container p-4" >
        @yield('content')
    </div>

    </main>

    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>
