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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body class="bg-prussian-blue">
<header class="container-fluid shadow-lg bg-white poppins fw-bold w-auto mb-3">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand text-royal-blue" href="/"><img src="{{asset('logo.svg')}}" class="pe-1 logo-color" width="48" alt="logo"/>Oceans of Knowledge</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false" aria-controls="navbarSupportedContent" aria-label="Toggle navbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link active text-congress-blue" aria-current="page" href="/">Home</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link link active text-congress-blue" aria-current="page" href="/dashboard">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link active text-congress-blue" aria-current="page" href="/dashboard">Dashboard</a>
                    </li>
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
<footer class="fixed-bottom mt-5 shadow-lg bg-white">
    <div class="container-fluid text-white p-3">
        <div class="mt-3">
            <h5 class="poppins text-royal-blue text-center fw-light">Footer text here</h5>
        </div>
    </div>
</footer>
</body>
</html>
