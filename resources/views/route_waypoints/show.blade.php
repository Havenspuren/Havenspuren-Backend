@extends('components.layout')

@section('content')
    @include('components.indexRouteModal', ['route' => $route])
    @include('partials._backBtn')
    <div class="route-waypoints mt-5">
        <div class="container">
            <h1 class="display-5 text-center">Route <strong>{{ $route->name }}</strong></h1>
            <div class="row mt-4">
                <div class="col-xl-3 col-md-8 offset-xl-9 offset-md-4">
                    @include('partials._search', ['url' => '/routes/' . $route->id . '/waypoints'])
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($waypoints as $waypoint)
                    <div class="col-xl-3 col-md-6">
                        <div class="box rounded-3 shadow-sm mt-3 p-3 d-flex align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $waypoint->id }}" name="waypoint[]"
                                    input-title="{{ $waypoint->title }}"
                                    input-index="{{ App\Models\RouteWaypoint::where('route_id', $route->id)->where('waypoint_id', $waypoint->id)->pluck('index_of_route')->first() }}"
                                    @if (in_array($waypoint->id, $route_waypoints)) {{ 'checked' }} @endif><label
                                    class="form-check-label" for="waypoint[]">
                                    {{ $waypoint->title }}
                                </label>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-12">
                    <div class="d-flex justify-content-center">
                        <a href="/routes" class="btn btn-danger my-4 me-1"><i class="fa-solid fa-angle-left"></i>
                            Abbrechen</a>
                        <button class="btn btn-primary my-4" id="indexRouteButton" data-bs-toggle="modal"
                            data-bs-target="#indexRouteModal">
                            Weiter <i class="fa-solid fa-angle-right"></i></button>
                    </div>
                </div>
            </div>
        </div>

    </div>


@stop
