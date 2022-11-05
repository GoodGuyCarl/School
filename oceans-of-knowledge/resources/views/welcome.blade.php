<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Oceans of Knowledge</title>
    <style>
        .custom-gradient {
            background: linear-gradient(to right, rgba(185,132,140,0.5), rgba(128,100,145,0.5))
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header class="container-fluid custom-gradient shadow">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><img src="{{asset('logo.svg')}}" class="pe-1" width="48" alt="logo"/>Oceans of Knowledge</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false" aria-controls="navbarSupportedContent" aria-label="Toggle navbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-dark" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarClassesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Classes</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarClassesDropdown">
                            <li><a class="dropdown-item" href="#">Grade 7</a></li>
                            <li><a class="dropdown-item" href="#">Grade 8</a></li>
                            <li><a class="dropdown-item" href="#">Grade 9</a></li>
                            <li><a class="dropdown-item" href="#">Grade 10</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Staff</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Vaccines</a>
                    </li>
                </ul>
                <button class="btn btn-outline-dark shadow" href="#">Login</button>
            </div>
        </div>
    </nav>
</header>
<main>

</main>
<footer>

</footer>
</body>
</html>
