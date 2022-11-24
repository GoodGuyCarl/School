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
<header class="container-fluid gradient shadow-lg poppins fw-bold">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand text-prussian-blue" href="/"><img src="{{asset('logo.svg')}}" class="pe-1" width="48" alt="logo"/>Oceans of Knowledge</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false" aria-controls="navbarSupportedContent" aria-label="Toggle navbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-royal-blue" aria-current="page" href="/">Home</a>
                    </li>
                </ul>
                <a class="btn bg-trendy-pink-outline text-royal-blue shadow-lg fw-bold" href="/form">Login or Sign Up</a>
            </div>
        </div>
    </nav>
</header>
<main class="bd-content order-1 py-5">
    <div class="container text-center">
        <h1 class="poppins text-brandy-rose fw-bolder mt-5">Oceans of Knowledge</h1>
        <p class="poppins text-brandy-rose fw-lighter my-5">A web-based Vaccination Management System</p>
        <img src="https://via.placeholder.com/500.png?text=Placeholder" alt="banner">
    </div>
</main>
<footer class="fixed-bottom mt-5 shadow-lg">
    <div class="container-fluid text-white p-3 gradient">
        <div class="mt-3">
            <h5 class="poppins text-center fw-light">Made by Carl Sanguyo</h5>
        </div>
    </div>
</footer>
</body>
</html>
