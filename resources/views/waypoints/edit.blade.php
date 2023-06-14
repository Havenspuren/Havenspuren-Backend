@extends('components.layout')

@section('content')
    @include('partials._backBtn')
    <div class="create-route mt-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-10 offset-lg-2 offset-md-1">
                    <form class="p-4 rounded-4 shadow-lg" method="POST" action="/waypoints/{{ $waypoint->id }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h1 class="display-5 mb-3">Neuer Waypoint</h1>

                        <div class="">
                            <label for="title" class="form-label">Titel</label>
                            <input type="text" class="form-control" name="title" value="{{ $waypoint->title }}">
                            <small class="form-text text-danger no-error @error('title') error @enderror"><i
                                    class="fa-solid fa-circle-exclamation"></i> @error('title')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                        <div class="">
                            <label for="short_description" class="form-label">Kurzbeschreibung</label>
                            <textarea class="form-control" name="short_description" rows="4">{{ $waypoint->short_description }}</textarea>
                            <small class="form-text text-danger no-error @error('long_description') error @enderror"><i
                                    class="fa-solid fa-circle-exclamation"></i> @error('long_description')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                        <div class="">
                            <label for="long_description" class="form-label">Beschreibung</label>
                            <textarea class="form-control" name="long_description" rows="4">{{ $waypoint->long_description }}</textarea>
                            <small class="form-text text-danger no-error @error('short_description') error @enderror"><i
                                    class="fa-solid fa-circle-exclamation"></i> @error('short_description')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label for="latitude" class="form-label">Latitude</label>
                                <input type="text" class="form-control" name="latitude"
                                    value="{{ $waypoint->latitude }}">
                                <small class="form-text text-danger no-error @error('latitude') error @enderror"><i
                                        class="fa-solid fa-circle-exclamation"></i> @error('latitude')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="col-6">
                                <label for="longitude" class="form-label">Longitude</label>
                                <input type="text" class="form-control" name="longitude"
                                    value="{{ $waypoint->longitude }}">
                                <small class="form-text text-danger no-error @error('longitude') error @enderror"><i
                                        class="fa-solid fa-circle-exclamation"></i> @error('longitude')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                        </div>
                        <div class="mt-1">
                            <a href="/waypoints" class="btn btn-danger"><i class="fa-solid fa-angle-left"></i> Abbrechen
                            </a>
                            <button class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>
                                Bearbeiten</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    @stop
