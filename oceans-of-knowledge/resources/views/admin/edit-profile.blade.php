@extends('layouts.main')
@section('content')
    <main class="poppins pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 mb-3">
                    <form action="{{url()->previous()}}">
                        <button type="submit" class="btn btn-hover fw-bolder">Go back to previous page</button>
                    </form>
                </div>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            Profile Information
                        </div>
                        <div class="card-body">
                            <form class="row justify-content-center" method="POST" action="{{route('adminupdate', $user->id)}}">
                                @csrf
                                <div class="col-md-5">
                                    <label class="form-label" for="firstname">First name</label>
                                    <input id="firstname" name="firstname" type="text" class="form-control mb-2" value="{{$user->firstname}}">
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label" for="surname">Surname</label>
                                    <input id="surname" name="surname" type="text" class="form-control mb-2" value="{{$user->surname}}">
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label">Year Level</label>
                                    <select class="form-select mb-2" name="year_level" aria-label="Year Level">
                                        <option value="{{$user->year_level}}" selected>{{$user->year_level}}</option>
                                        <option value="Grade 7">Grade 7</option>
                                        <option value="Grade 8">Grade 8</option>
                                        <option value="Grade 9">Grade 9</option>
                                        <option value="Grade 10">Grade 10</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label for="vax_status" class="form-label">Vaccination Status</label>
                                    <select id="vax_status" class="form-select mb-2" name="vaccination_status">
                                        <option value="{{$user->vaccination_status}}" selected>{{$user->vaccination_status}}</option>
                                        <option value="Unvaccinated">Unvaccinated</option>
                                        <option value="Vaccinated with 1st dose">Vaccinated with 1st dose</option>
                                        <option value="Vaccinated with 2nd dose">Vaccinated with 2nd dose</option>
                                        <option value="Vaccinated with 2nd dose and 1 booster shot">Vaccinated with 2nd dose and 1 booster shot</option>
                                        <option value="Vaccinated with 2nd dose and 2 booster shots">Vaccinated with 2nd dose and 2 booster shots</option>
                                    </select>
                                </div>
                                @if($user->role == '0')
                                    <div class="col-md-10">
                                        <label for="enroll_date" class="form-label">Date of enrollment</label>
                                        <input id="enroll_date" value="{{$user->enrollment_date}}" type="date" class="form-control mb-2" name="enrollment_date">
                                    </div>
                                @elseif($user->role == '2')
                                    <div class="col-md-10">
                                        <label for="enroll_date" class="form-label">Date of employment</label>
                                        <input id="enroll_date" value="{{$user->enrollment_date}}" type="date" class="form-control mb-2" name="enrollment_date">
                                    </div>
                                @endif
                                <div class="col-md-10">
                                    <label class="form-label">{{$user->firstname}} {{$user->surname}} vaccination card:</label>
                                    <img src="{{ Storage::url(($user->vaccination_card)) }}" class="w-50" alt="Vaccine Card"/>
                                </div>
                                <div class="col-md-10 text-center my-3">
                                    <button type="submit" class="btn btn-hover">Apply changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
