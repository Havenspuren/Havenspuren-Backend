@extends('components.layout')

@section('content')
    @include('partials._backBtn', ['url' => '/routes'])
    <div class="create-route mt-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-10 offset-lg-2 offset-md-1">
                    <form class="p-4 rounded-4 shadow-lg" method="POST" action="/routes" enctype="multipart/form-data">
                        @csrf
                        <h1 class="display-5 mb-3">Neue Route</h1>
                        <div class="row">
                            <div class="col-6">
                                <div class="">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                    <small class="form-text text-danger no-error @error('name') error @enderror"><i
                                            class="fa-solid fa-circle-exclamation"></i> @error('name')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>
                                <div class="">
                                    <label for="description" class="form-label">Beschreibung</label>
                                    <textarea class="form-control" name="description" rows="4">{{ old('description') }}</textarea>
                                    <small class="form-text text-danger no-error @error('description') error @enderror"><i
                                            class="fa-solid fa-circle-exclamation"></i> @error('description')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>
                                <div class="">
                                    <label for="expected_time" class="form-label">Erwartete Zeit</label>
                                    <input type="text" class="form-control" name="expected_time"
                                        value="{{ old('expected_time') }}">
                                    <small class="form-text text-danger no-error @error('expected_time') error @enderror"><i
                                            class="fa-solid fa-circle-exclamation"></i> @error('expected_time')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>
                            </div>
                            <div class="col-6 d-flex align-content-between flex-wrap">
                                <div class="">
                                    <label for="route_image" class="form-label">route_image</label>
                                    <input type="file" class="form-control" name="path_to_route_image"
                                        value="{{ old('path_to_route_image') }}">
                                    <small
                                        class="form-text text-danger no-error @error('path_to_route_image') error @enderror"><i
                                            class="fa-solid fa-circle-exclamation"></i> @error('path_to_route_image')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>
                                <div class="">
                                    <label for="map_image" class="form-label">map_image</label>
                                    <input type="file" class="form-control" name="path_to_map_image"
                                        value="{{ old('path_to_map_image') }}">
                                    <small
                                        class="form-text text-danger no-error @error('path_to_map_image') error @enderror"><i
                                            class="fa-solid fa-circle-exclamation"></i> @error('path_to_map_image')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>
                                <div class="">
                                    <label for="character_image" class="form-label">character_image</label>
                                    <input type="file" class="form-control" name="path_to_character_image"
                                        value="{{ old('path_to_character_image') }}">
                                    <small
                                        class="form-text text-danger no-error @error('path_to_character_image') error @enderror"><i
                                            class="fa-solid fa-circle-exclamation"></i> @error('path_to_character_image')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <a href="/routes" class="btn btn-danger"><i class="fa-solid fa-angle-left"></i> Abbrechen
                                </a>
                                <button class="btn btn-primary"><i class="fa-solid fa-plus"></i>
                                    Hinzufügen</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @stop
