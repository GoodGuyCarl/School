@extends('layouts.main')
@section('content')
    <main class="poppins pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg">
                        <h3 class="card-header bg-prussian-blue text-center text-white fw-bold p-4">Login</h3>
                        <div class="card-body">
                            <h3 class="card-title text-center text-prussian-blue fw-bold">Oceans of Knowledge</h3>
                            <p class="text-center fw-lighter text-prussian-blue">A web-based vaccination<br>management system</p>
                            @if(Session::has('register_success'))
                                <div class="alert alert-success">
                                    {{ Session::get('register_success') }}
                                </div>
                            @endif
                            <form method="POST" action="{{route('postlogin')}}">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="email" placeholder="Email" class="form-control" name="email" autofocus>
                                    <label for="email">Email</label>
                                @if($errors->has('email'))
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" placeholder="Password" class="form-control" name="password" autofocus>
                                    <label for="password">Password</label>
                                    @if($errors->has('password'))
                                        <span class="text-danger">{{$errors->first('password')}}</span>
                                    @endif
                                </div>
                                @if(Session::has('message'))
                                    <div class="alert alert-danger mt-3">
                                        {{Session::get('message')}}
                                    </div>
                                @endif
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-hover fw-bolder">Login</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
