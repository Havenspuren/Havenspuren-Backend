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
          </tr>
        </thead>
        <tbody>
              <tr>
                  <td>{{$route->id}}</td>
                  <td>{{$route->name}}</td>
                  <td>{{$route->description}}</td>
                  <td>
                    <img src="{{ asset('storage/route_image/'.$route->path_to_route_image)}}" alt="test" height="100px" width="100px">
                  </td>
                  <td>{{$route->expected_time}}</td>
                  <td>
                    <img src="{{ asset('storage/map_image/'.$route->path_to_map_image)}}" alt="test" height="100px" width="100px">
                  </td>
                  <td>
                    <img src="{{ asset('storage/character_image/'.$route->path_to_character_image)}}" alt="test" height="100px" width="100px">
                  </td>
              </tr>  
      </table>
</div>
@stop
