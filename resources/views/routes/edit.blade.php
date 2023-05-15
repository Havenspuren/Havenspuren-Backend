@extends('layouts.layout')

@section('content')
<div class="container-fluid">
    <table class="table">
        <h1 class="text-center text-decoration-underline">Route</h1>
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
                <tr>
                    <td>{{$route->id}}</td>
                    <td>{{$route->name}}</td>
                    <td>{{$route->description}}</td>
                    <td>{{$route->path_to_route_image}}</td>
                    <td>{{$route->expected_time}}</td>
                    <td>{{$route->path_to_map_image}}</td>
                    <td>{{$route->path_to_character_image}}</td>
                </tr>  
      </table>
</div>
@stop
