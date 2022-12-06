<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Oceans of Knowledge</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="icon" type="image/x-icon" href="{{asset('logo.svg')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body class="bg-white">
<header class="container-fluid shadow-lg bg-prussian-blue poppins fw-bold w-auto mb-3">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="/"><img src="{{asset('logo.svg')}}" class="pe-1 logo-color" width="48" alt="logo"/>Oceans of Knowledge</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false" aria-controls="navbarSupportedContent" aria-label="Toggle navbar">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link link active text-white" aria-current="page" href="/">Home</a>
                    </li>
                    @else
                        @if(Auth::user()->role==0)
                    <li class="nav-item">
                        <a class="nav-link link active text-brandy-rose" aria-current="page" href="/profile">Home</a>
                    </li>
                        @elseif(Auth::user()->role==2)
                            @if(Route::current()->uri() == 'records')
                                <li class="nav-item">
                                    <a class="nav-link link active text-white" aria-current="page" href="/profile">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link link active text-brandy-rose" aria-current="page" href="/records">Students</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link link active text-brandy-rose" aria-current="page" href="/profile">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link link text-white" aria-current="page" href="/records">Students</a>
                                </li>
                            @endif

                        @else
                            @if(Route::current()->uri() == 'dashboard')
                            <li class="nav-item">
                                <a class="nav-link link active text-brandy-rose" aria-current="page" href="/profile">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link active text-white" aria-current="page" href="{{route('records')}}">Students</a>
                            </li>
                                <li class="nav-item">
                                    <a class="nav-link link active text-white" aria-current="page" href="{{route('staff')}}">Staff</a>
                                </li>
                            @endif
                                @if(Route::current()->uri() == 'records' && Auth::user()->role == 1)
                                    <li class="nav-item">
                                        <a class="nav-link link active text-white" aria-current="page" href="/profile">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link link active text-brandy-rose" aria-current="page" href="{{route('records')}}">Students</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link link active text-white" aria-current="page" href="{{route('staff')}}">Staff</a>
                                    </li>
                                @endif
                            @if(Route::current()->uri() =='staff' && Auth::user()->role == 1)
                                    <li class="nav-item">
                                        <a class="nav-link link active text-white" aria-current="page" href="/profile">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link link active text-white" aria-current="page" href="{{route('records')}}">Students</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link link active text-brandy-rose" aria-current="page" href="{{route('staff')}}">Staff</a>
                                    </li>
                                @endif
                        @endif
                    @endguest

                </ul>
                @guest
                <a class="btn btn-hover shadow-lg fw-bold me-1" href="{{route('login')}}">Login</a>
                <a class="btn btn-hover shadow-lg fw-bold mx-1" href="{{route('register-user')}}">Sign Up</a>
                @else
                <a class="btn btn-hover shadow-lg fw-bold me-1" href="{{route('signout')}}">Logout</a>
                @endguest
            </div>
        </div>
    </nav>
</header>
    @yield('content')
<footer class="poppins fixed-bottom mt-5 shadow-lg bg-prussian-blue">
    <div class="container-fluid text-white">
        <div class="row justify-content-center">
            <div class="col">
                <p class="text-center mt-3">
                    &copy; {{ date('Y') }} {{ config('app.name') }}
                </p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
