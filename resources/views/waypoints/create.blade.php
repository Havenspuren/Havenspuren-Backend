@extends('components.layout')

@section('content')
    @include('partials._backBtn', ['url' => '/waypoints'])
    <div class="create-route mt-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-10 offset-lg-2 offset-md-1">
                    <form class="p-4 rounded-4 shadow-lg" method="POST" action="/waypoints" enctype="multipart/form-data">
                        @csrf
                        <h1 class="display-5 mb-3">Neuer Waypoint</h1>

                        <div class="">
                            <label for="title" class="form-label">Titel</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            <small class="form-text text-danger no-error @error('title') error @enderror"><i
                                    class="fa-solid fa-circle-exclamation"></i> @error('title')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                        <div class="">
                            <label for="short_description" class="form-label">Kurzbeschreibung</label>
                            <textarea class="form-control" name="short_description" rows="4">{{ old('short_description') }}</textarea>
                            <small class="form-text text-danger no-error @error('long_description') error @enderror"><i
                                    class="fa-solid fa-circle-exclamation"></i> @error('long_description')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                        <div class="">
                            <label for="long_description" class="form-label">Beschreibung</label>
                            <textarea class="form-control" name="long_description" rows="4">{{ old('long_description') }}</textarea>
                            <small class="form-text text-danger no-error @error('short_description') error @enderror"><i
                                    class="fa-solid fa-circle-exclamation"></i> @error('short_description')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label for="latitude" class="form-label">Latitude</label>
                                <input type="text" class="form-control" name="latitude" value="{{ old('latitude') }}">
                                <small class="form-text text-danger no-error @error('latitude') error @enderror"><i
                                        class="fa-solid fa-circle-exclamation"></i> @error('latitude')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="col-6">
                                <label for="longitude" class="form-label">Longitude</label>
                                <input type="text" class="form-control" name="longitude" value="{{ old('longitude') }}">
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
                            <button class="btn btn-primary"><i class="fa-solid fa-plus"></i>
                                Hinzufügen</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    @stop
