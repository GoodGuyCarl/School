@extends('layouts.main')
@section('content')
    @if(Auth::user()->role == 1)
        <main class="poppins">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        @if(Route::current()->uri() == 'records')
                        <h1>Student Records</h1>
                        @else
                            <h1>Staff Records</h1>
                        @endif
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                        @endif

                    </div>

                    <div class="table">
                        <table style="margin-bottom: 5.0rem!important;" class="table table-bordered text-center overflow-scroll">
                            <thead class="bg-prussian-blue text-white">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Full name</th>
                                <th scope="col">Vaccination Status</th>
                                <th scope="col">Year Level</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>

                                    <td>{{$user->id}}</a></td>
                                    <td>{{$user->firstname}} {{$user->surname}}</td>
                                    <td>{{$user->vaccination_status}}</td>
                                    <td>{{$user->year_level}}</td>
                                    <td>
                                        <a href="{{route('edit', $user->id)}}" class="link-primary">Edit</a>
                                        @if(Route::current()->uri() == 'records')
                                            <a href="{{route('delete_student', $user->id)}}" class="link-primary">Delete</a>
                                        @else
                                            <a href="{{route('delete_staff', $user->id)}}" class="link-primary">Delete</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    @elseif(Auth::user()->role==2)
        <main class="poppins">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        <h1>Class Records</h1>
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                        @endif

                    </div>

                    <div class="table">
                        <table style="margin-bottom: 3.0rem!important;" class="table table-bordered text-center overflow-scroll">
                            <thead class="bg-prussian-blue text-white">
                            <tr>
                                <th scope="col">Full name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Vaccination Status</th>
                                <th scope="col">Year Level</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->firstname}} {{$user->surname}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->vaccination_status}}</td>
                                    <td>{{$user->year_level}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    @endif
@endsection
