@extends('layouts.main')
@section('content')
    @if(Auth::user()->role == 1)
        <main class="poppins pb-5">
            <div class="container">
                <div>
                    <form action="{{url()->previous()}}">
                        <button type="submit" class="btn btn-hover fw-bolder">Go back to previous page</button>
                    </form>
                </div>
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
                        <form action="{{route('search')}}">
                            <div class="mb-4">
                                <input formaction="submit" name="keyword" id="keyword" type="search" placeholder="Search through all records of students and teachers" class="form-control">
                            </div>
                        </form>
                        <table style="margin-bottom: 5.0rem!important;" class="table table-bordered text-center overflow-scroll">
                            <thead class="bg-prussian-blue text-white">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Full name</th>
                                <th scope="col">Vaccination Status</th>
                                @if(Route::current()->uri() == 'records')
                                    <th scope="col">Date of Enrollment</th>
                                @else
                                    <th scope="col">Date of Employment</th>
                                @endif
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
                                    <td>{{$user->enrollment_date}}</td>
                                    <td>{{$user->year_level}}</td>
                                    <td>
                                        <a href="{{route('edit', $user->id)}}" class="btn btn-secondary">Edit</a>
                                        @if(Route::current()->uri() == 'records')
                                            <a href="{{route('delete_student', $user->id)}}" class="btn btn-danger">Delete</a>
                                        @else
                                            <a href="{{route('delete_staff', $user->id)}}" class="btn btn-danger">Delete</a>
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
        <main class="poppins pb-5">
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
