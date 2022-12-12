@extends('layouts.main')
@section('content')
<main class="poppins pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-prussian-blue fw-bold text-brandy-rose">
                        Your Profile
                    </div>
                    <div class="card-body">
                        <form class="row justify-content-center">
                            @if(Session::has('message'))
                                <div class="alert alert-success col-md-10">
                                    {{Session::get('message')}}
                                </div>
                            @endif

                            <div class="col-md-5">
                                <label class="form-label" for="name">First name</label>
                                <input disabled id="name" type="text" class="form-control mb-2" placeholder="{{Auth::user()->firstname}}">
                            </div>
                            <div class="col-md-5">
                                <label class="form-label" for="name">Surname</label>
                                <input disabled id="name" type="text" class="form-control mb-2" placeholder="{{Auth::user()->surname}}">
                            </div>
                            <div class="col-md-5">
                                <label class="form-label">Year Level</label>
                                <select disabled class="form-select" aria-label="Year Level">
                                    <option selected>{{Auth::user()->year_level}}</option>
                                    <option value="Grade 7">Grade 7</option>
                                    <option value="Grade 8">Grade 8</option>
                                    <option value="Grade 9">Grade 9</option>
                                    <option value="Grade 10">Grade 10</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label for="vax_status" class="form-label">Vaccination Status</label>
                                <select disabled id="vax_status" class="form-select mb-2" name="vaccination_status">
                                    <option selected disabled>{{Auth::user()->vaccination_status}}</option>
                                    <option value="Unvaccinated">Unvaccinated</option>
                                    <option value="Vaccinated with 1st dose">Vaccinated with 1st dose</option>
                                    <option value="Vaccinated with 2nd dose">Vaccinated with 2nd dose</option>
                                    <option value="Vaccinated with 2nd dose and 1 booster shot">Vaccinated with 2nd dose and 1 booster shot</option>
                                    <option value="Vaccinated with 2nd dose and 2 booster shots">Vaccinated with 2nd dose and 2 booster shots</option>
                                </select>
                            </div>
                            <div class="col-md-5 text-center my-3">
                                <a href="{{route('edit_profile')}}" class="btn btn-hover">Edit your profile</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
