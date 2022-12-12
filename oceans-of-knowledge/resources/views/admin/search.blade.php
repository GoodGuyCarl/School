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
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
