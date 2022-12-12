@extends('layouts.main')
@section('content')
    <main class="poppins pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-prussian-blue fw-bold text-brandy-rose">
                            Your vaccination card
                        </div>
                        <div class="card-body text-center">
                            @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            <h5>Your vaccination card:</h5>
                            <img src="{{ Storage::url((Auth::user()->vaccination_card)) }}" class="w-50 mb-3" alt="Vaccine Card"/>
                            <form action="{{route('upload_vax')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input class="form-control mb-2" type="file" name="vaccination_card" accept="image/*">
                                <button class="btn btn-hover" type="submit">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
