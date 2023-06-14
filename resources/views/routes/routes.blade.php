@extends('components.layout')

@section('content')
    @include('partials._backBtn', ['url' => '/'])
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-3 text-center">Routes</h1>

                <div class="row mt-4 mt-md-2">
                    <div class="col-xl-10 col-md-8 col-4">
                        <a href="/routes/create" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
                    </div>
                    <div class="col-xl-2 col-md-4 col-8">
                        @include('partials._search', ['url' => '/routes'])
                    </div>
                </div>
                <div class="table-wrapper">
                    <table class="table table-striped text-center mt-2">

                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">name</th>
                                <th scope="col">description</th>
                                <th scope="col">path_to_route_image</th>
                                <th scope="col">expected_time</th>
                                <th scope="col">path_to_map_image</th>
                                <th scope="col">path_to_character_image</th>
                                <th scope="col">actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($routes as $route)
                                <tr>
                                    <td>{{ $route->id }}</td>
                                    <td>{{ $route->name }}</td>
                                    <td>
                                        <?php
                                        $desc = $route->description;
                                        if (strlen($desc) > 100) {
                                            $desc = substr($desc, 0, strrpos(substr($desc, 0, 100), ' ')) . ' ...';
                                        }
                                        echo $desc;
                                        ?>
                                    </td>
                                    <td>
                                        <img src="{{ asset('storage/route_image/' . $route->path_to_route_image) }}">
                                    </td>
                                    <td>{{ $route->expected_time }}</td>
                                    <td>
                                        <img src="{{ asset('storage/map_image/' . $route->path_to_map_image) }}">
                                    </td>
                                    <td>
                                        <img
                                            src="{{ asset('storage/character_image/' . $route->path_to_character_image) }}">
                                    </td>
                                    <td>
                                        <ul
                                            class="list-group list-group-horizontal list-unstyled rounded-3 actions d-flex justify-content-center">
                                            <li class="list-group-item">
                                                <form method="GET" action="/routes/{{ $route->id }}/waypoints">
                                                    <button><i class="fa-solid fa-gears"></i></button>
                                                </form>
                                            </li>
                                            <li class="list-group-item">
                                                <form method="GET" action="/routes/{{ $route->id }}">
                                                    <button class="show">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </button>

                                                </form>
                                            </li>
                                            <li class="list-group-item">
                                                <form method="GET" action="/routes/{{ $route->id }}/edit">
                                                    <button class="edit">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>
                                                </form>
                                            </li>
                                            <li class="list-group-item">
                                                <form method="POST" action="/routes/{{ $route->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="delete">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>

                                                </form>
                                            </li>
                                        </ul>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                @if (count($routes) == 0)
                    <p class="text-center">Keine Routen gefunden.</p>
                @endif
            </div>
        </div>
        <div class="mt-4">
            {{ $routes->links() }}
        </div>
    </div>
@endsection
