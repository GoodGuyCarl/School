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
                <button class="btn bg-trendy-pink-outline text-royal-blue shadow-lg fw-bold" href="{{url('/form')}}">Login or Sign Up</button>
            </div>
        </div>
    </nav>
</header>
<main class="w-25 m-auto p-5 ms">
    <div class="container text-center">
        <h1 class="poppins text-brandy-rose fw-bolder mt-5">Oceans of Knowledge</h1>
        <p class="poppins text-brandy-rose fw-lighter my-4">A web-based Vaccination Management System</p>
        <form class="gradient rounded-4 p-5 shadow-lg">
            <h1 class="h3 mb-3 fw-bold poppins text-brandy-rose">Login</h1>
            <div class="form-floating">
                <input type="email" class="form-control" placeholder="juandelacruz@yahoo.com" id="email">
                <label for="email">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" placeholder="Password" id="password">
                <label for="password">Password</label>
            </div>
            <button type="submit" class="btn bg-trendy-pink-outline text-brandy-rose shadow-lg fw-bold mt-4 w-50">Login</button>
        </form>
    </div>
</main>
</body>
</html>
