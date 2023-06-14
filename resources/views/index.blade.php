@extends('components.layout')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-2 col-md-6 offset-lg-5 offset-md-3">
                <a href="/routes" class="btn btn-primary btn-lg w-100">
                    Routen
                </a>
                <a href="/waypoints" class="btn btn-primary btn-lg w-100 mt-2">
                    Waypoints
                </a>
                <a href="/" class="btn btn-primary btn-lg w-100 mt-2">
                    Trophies
                </a>
            </div>
        </div>

    </div>
@endsection
