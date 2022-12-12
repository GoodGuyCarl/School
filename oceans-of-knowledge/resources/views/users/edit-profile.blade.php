@extends('layouts.main')
@section('content')
    <main class="poppins pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header  bg-prussian-blue fw-bold text-brandy-rose">
                            Student Profile
                        </div>
                        <div class="card-body">
                            <form class="row justify-content-center" method="POST" action="{{route('update')}}">
                                @csrf
                                <div class="col-md-5">
                                    <label class="form-label" for="firstname">First name</label>
                                    <input id="firstname" name="firstname" type="text" class="form-control mb-2" value="{{Auth::user()->firstname}}">
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label" for="surname">Surname</label>
                                    <input id="surname" name="surname" type="text" class="form-control mb-2" value="{{Auth::user()->surname}}">
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label">Year Level</label>
                                    <select class="form-select mb-2" name="year_level" aria-label="Year Level">
                                        <option value="{{Auth::user()->year_level}}" selected>{{Auth::user()->year_level}}</option>
                                        <option value="Grade 7">Grade 7</option>
                                        <option value="Grade 8">Grade 8</option>
                                        <option value="Grade 9">Grade 9</option>
                                        <option value="Grade 10">Grade 10</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label for="vax_status" class="form-label">Vaccination Status</label>
                                    <select id="vax_status" class="form-select mb-2" name="vaccination_status">
                                        <option value="{{Auth::user()->vaccination_status}}" selected>{{Auth::user()->vaccination_status}}</option>
                                        <option value="Unvaccinated">Unvaccinated</option>
                                        <option value="Vaccinated with 1st dose">Vaccinated with 1st dose</option>
                                        <option value="Vaccinated with 2nd dose">Vaccinated with 2nd dose</option>
                                        <option value="Vaccinated with 2nd dose and 1 booster shot">Vaccinated with 2nd dose and 1 booster shot</option>
                                        <option value="Vaccinated with 2nd dose and 2 booster shots">Vaccinated with 2nd dose and 2 booster shots</option>
                                    </select>
                                </div>
                                <div class="col-md-12 text-center">
                                    <a href="{{route('upload')}}" class="link-info">Upload vaccination card here.</a>
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
