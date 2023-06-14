@extends('components.layout')

@section('content')
    @include('partials._backBtn', ['url' => '/waypoints'])
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <h1 class="display-5 mb-4">{{ $waypoint->title }}</h1>
                <h5>Kurzbeschreibung</h5>
                <p>{{ $waypoint->short_description }}</p>
                <h5>Beschreibung</h5>
                <p>{{ $waypoint->long_description }}</p>
                <p>
                    <strong><i class="fa-solid fa-map-location-dot"></i> Latlng:</strong>
                    {{ $waypoint->latitude }}, {{ $waypoint->longitude }}
                </p>
                <div class="mt-4 d-flex align-items-center">
                    <form method="GET" action="/waypoints/{{ $waypoint->id }}/edit">
                        <button class="btn btn-primary">
                            <i class="fa-solid fa-pen-to-square"></i> Waypoint bearbeiten
                        </button>
                    </form>
                    <form method="POST" action="/waypoints/{{ $waypoint->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger ms-2">
                            <i class="fa-solid fa-trash"></i> Route Löschen
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
