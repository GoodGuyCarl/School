@extends('layouts.main')
@section('content')
    <main class="poppins pb-5">
        <div class="container">
            <div>
                <form action="{{url()->previous()}}">
                    <button type="submit" class="btn btn-hover fw-bolder">Go back</button>
                </form>
            </div>
            <div class="row justify-content-center">

                <div class="col-md-8 text-center">
                    <h1>
                        Search Results
                    </h1>
                </div>
                <div class="table">
                    <table style="margin-bottom: 5.0rem!important;" class="table table-bordered text-center overflow-scroll">
                        <thead class="bg-prussian-blue text-white">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Vaccination Status</th>
                            <th scope="col">Enrollment Date</th>
                            <th scope="col">Year Level</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($results as $result)
                            <tr>
                                <td>{{ $result->id }}</td>
                                <td>{{ $result->firstname }} {{$result->surname}}</td>
                                <td>{{ $result->vaccination_status }}</td>
                                <td>{{ $result->enrollment_date }}</td>
                                <td>{{ $result->year_level }}</td>
                                <td>
                                    <a href="{{route('edit', $result->id)}}" class="btn btn-secondary">Edit</a>
                                    @if($result->role=='0')
                                        <a href="{{route('delete_student', $result->id)}}" class="btn btn-danger">Delete</a>
                                    @else
                                        <a href="{{route('delete_staff', $result->id)}}" class="btn btn-danger">Delete</a>
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
@endsection
