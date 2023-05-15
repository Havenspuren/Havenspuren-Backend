@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
        <table class="table">
            <h1 class="text-center text-decoration-underline">Routes</h1>
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">name</th>
                    <th scope="col">description</th>
                    <th scope="col">path_to_route_image</th>
                    <th scope="col">expected_time</th>
                    <th scope="col">path_to_map_image</th>
                    <th scope="col">path_to_character_image</th>
                    <td scope="col"></td>
                    <th scope="col">actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($routes as $route)
                    <tr>
                        <td>{{ $route->id }}</td>
                        <td>{{ $route->name }}</td>
                        <td>{{ $route->description }}</td>
                        <td>
                            <img src="{{ asset('storage/route_image/' . $route->path_to_route_image) }}" alt="test"
                                height="60px" width="60px" style="border-radius: 50%">
                        </td>
                        <td>{{ $route->expected_time }}</td>
                        <td>
                            <img src="{{ asset('storage/map_image/' . $route->path_to_map_image) }}" alt="test"
                                height="60px" width="60px" style="border-radius: 50%">
                        </td>
                        <td>
                            <img src="{{ asset('storage/character_image/' . $route->path_to_character_image) }}"
                                alt="test" height="60px" width="60px" style="border-radius: 50%">
                        </td>
                        <td>
                            <a href="{{ route('routes.show', $route->id) }}">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('routes.edit', $route->id) }}">
                                <i class="bi bi-arrow-repeat"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('routes.destroy', $route->id) }}" method="post">
                                @method('DELETE')
                                <!--<input type="hidden" name="_method" value="DELETE">-->
                                <button type="submit" class="bi bi-trash-fill"
                                    style="border:none; background-color:white"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        </table>
    </div>
@stop
