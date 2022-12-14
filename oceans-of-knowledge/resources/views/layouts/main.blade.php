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
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body class="bg-white" style="padding-bottom: 35vh">
<header class="container-fluid shadow-lg bg-prussian-blue poppins fw-bold w-auto mb-3">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="/"><img src="{{asset('favicon.ico')}}" class="pe-1" width="48" alt="logo"/>Oceans of Knowledge</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false" aria-controls="navbarSupportedContent" aria-label="Toggle navbar">
                <i class="fa fa-archive"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @guest
                    @if(Route::current()->uri() == '/')
                            <li class="nav-item">
                                <a class="nav-link link active text-brandy-rose" aria-current="page" href="/"><i class="fa fa-home me-2"></i>Home</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link link active text-white" aria-current="page" href="/"><i class="fa fa-home me-2"></i>Home</a>
                            </li>
                        @endif
                    @else
                        @if(Auth::user()->role==0)
                    <li class="nav-item">
                        <a class="nav-link link active text-brandy-rose" aria-current="page" href="/profile"><i class="fa fa-home me-2"></i>Home</a>
                    </li>
                        @elseif(Auth::user()->role==2)
                            @if(Route::current()->uri() == 'records')
                                <li class="nav-item">
                                    <a class="nav-link link active text-white" aria-current="page" href="/profile"><i class="fa fa-home me-2"></i>Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link link active text-brandy-rose" aria-current="page" href="/records"><i class="fa fa-user-o me-2"></i>Students</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link link active text-brandy-rose" aria-current="page" href="/profile"><i class="fa fa-home me-2"></i>Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link link text-white" aria-current="page" href="/records"><i class="fa fa-user-o me-2"></i>Students</a>
                                </li>
                            @endif

                        @else
                            @if(Route::current()->uri() == 'dashboard')
                            <li class="nav-item">
                                <a class="nav-link link active text-brandy-rose" aria-current="page" href="/profile"><i class="fa fa-home me-2"></i>Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link active text-white" aria-current="page" href="{{route('records')}}"><i class="fa fa-user-o me-2"></i>Students</a>
                            </li>
                                <li class="nav-item">
                                    <a class="nav-link link active text-white" aria-current="page" href="{{route('staff')}}"><i class="fa fa-user me-2"></i>Staff</a>
                                </li>
                            @endif
                                @if(Route::current()->uri() == 'records' && Auth::user()->role == 1)
                                    <li class="nav-item">
                                        <a class="nav-link link active text-white" aria-current="page" href="/profile"><i class="fa fa-home me-2"></i>Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link link active text-brandy-rose" aria-current="page" href="{{route('records')}}"><i class="fa fa-user-o me-2"></i>Students</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link link active text-white" aria-current="page" href="{{route('staff')}}"><i class="fa fa-user me-2"></i>Staff</a>
                                    </li>
                                @endif
                            @if(Route::current()->uri() =='staff' && Auth::user()->role == 1)
                                    <li class="nav-item">
                                        <a class="nav-link link active text-white" aria-current="page" href="/profile"><i class="fa fa-home me-2"></i>Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link link active text-white" aria-current="page" href="{{route('records')}}"><i class="fa fa-user-o me-2"></i>Students</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link link active text-brandy-rose" aria-current="page" href="{{route('staff')}}"><i class="fa fa-user me-2"></i>Staff</a>
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
<footer class="d-none d-sm-block fixed-bottom poppins bg-prussian-blue text-white pt-3 pb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-2 col-md-3 col-lg-4">
                <h4>About Us</h4>
                <p>
                    Our team consists of four people.<br>
                    Carl Sanguyo (the programmer),<br>
                    Jian Carlo Estaniol (the scrum master),<br>
                    Jocel Arana (the documentator),<br>
                    Steven Billones (the systems analyst)<br>
                </p>
            </div>
            <div class="col-md-3 col-lg-4">
                <h4>Our socials:</h4>
                <ul>
                    <li>
                        <a class="text-white" href="https://www.facebook.com/oceansofknowledge">
                            <i class="fa fa-facebook-official me-2"></i>Facebook
                        </a>
                    </li>
                    <li>
                        <a class="text-white" href="https://twitter.com/oceansofknowledge">
                            <i class="fa fa-twitter me-2"></i>Twitter
                        </a>
                    </li>
                    <li>
                        <a class="text-white" href="https://github.com/oceansofknowledge">
                            <i class="fa fa-github-square me-2"></i>GitHub
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 col-lg-4">
                <h5>Want to support this website?</h5>
                <p>
                    Scan the QR code to make a donation:
                </p>
                <span>
                    <img src="{{asset('qr.png')}}" alt="QR code for donations" class="w-25 img-fluid" />
                </span>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-12">
                &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
            </div>
        </div>
    </div>
</footer>
</body>
</html>
