@extends('components.layout')

@section('content')
    @include('partials._backBtn', ['url' => '/routes'])
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <h1 class="display-5">{{ $route->name }}</h1>
                <p>{{ $route->description }}</p>
                <strong><i class="fa-solid fa-clock"></i> Erwartete Zeit: {{ $route->expected_time }}</strong>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="image d-flex align-items-center h-100">
                            <img src="{{ asset('storage/route_image/' . $route->path_to_route_image) }}"
                                class="img-fluid rounded-4">
                        </div>
                    </div>
                    <div class="col-md-4 mt-2 mt-md-0">
                        <div class="image d-flex align-items-center h-100">
                            <img src="{{ asset('storage/map_image/' . $route->path_to_map_image) }}"
                                class="img-fluid rounded-4">
                        </div>
                    </div>
                    <div class="col-md-4 mt-2 mt-md-0">
                        <div class="image d-flex align-items-center h-100">
                            <img src="{{ asset('storage/character_image/' . $route->path_to_character_image) }}"
                                class="img-fluid rounded-4">
                        </div>
                    </div>
                </div>
                <div class="mt-4 d-flex align-items-center">
                    <form method="GET" action="/routes/{{ $route->id }}/edit">
                        <button class="btn btn-primary">
                            <i class="fa-solid fa-pen-to-square"></i> Route bearbeiten
                        </button>
                    </form>
                    <form method="POST" action="/routes/{{ $route->id }}">
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
