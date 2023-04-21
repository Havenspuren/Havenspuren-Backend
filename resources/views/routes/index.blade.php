@extends('layouts.layout')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">name</th>
        <th scope="col">description</th>
        <th scope="col">path_to_route_image</th>
        <th scope="col">expected_time</th>
        <th scope="col">path_to_map_image</th>
        <th scope="col">path_to_character_image</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($routes as $route)
            <tr>
                <td>{{$route->id}}</td>
                <td>{{$route->name}}</td>
                <td>{{$route->description}}</td>
                <td>{{$route->path_to_route_image}}</td>
                <td>{{$route->expected_time}}</td>
                <td>{{$route->path_to_map_image}}</td>
                <td>{{$route->path_to_character_image}}</td>
            </tr> 
        @endforeach  
  </table>
@stop
