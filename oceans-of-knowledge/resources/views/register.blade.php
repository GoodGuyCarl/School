@extends('layouts.main')
@section('content')
    <main class="poppins">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center text-prussian-blue fw-bold p-4">Create account</h3>
                        <div class="card-body">
                            <h3 class="card-title text-center text-prussian-blue fw-bold">Oceans of Knowledge</h3>
                            <p class="text-center fw-lighter text-prussian-blue">A web-based vaccination<br>management system</p>
                            <form method="POST" action="{{route('postregister')}}">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="email" placeholder="Email" class="form-control" name="email" autofocus>
                                    <label for="email">Email</label>
                                    @if($errors->has('email'))
                                        <span class="text-danger">{{$errors->first('email')}}</span>
                                    @endif
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" placeholder="First name" class="form-control" name="firstname" autofocus>
                                    <label for="firstname">First name</label>
                                    @if($errors->has('firstname'))
                                        <span class="text-danger">{{$errors->first('firstname')}}</span>
                                    @endif
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" placeholder="Surname" class="form-control" name="surname" autofocus>
                                    <label for="surname">Surname</label>
                                    @if($errors->has('surname'))
                                        <span class="text-danger">{{$errors->first('surname')}}</span>
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
                                    <button type="submit" class="btn btn-hover fw-bolder text-prussian-blue">Create account</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
