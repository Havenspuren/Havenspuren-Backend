@extends('components.layout')

@section('content')
    @include('partials._backBtn', ['url' => '/'])

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-3 text-center">Waypoints</h1>
                <div class="row mt-4 mt-md-2">
                    <div class="col-xl-10 col-md-8 col-4">
                        <a href="/waypoints/create" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
                    </div>
                    <div class="col-xl-2 col-md-4 col-8">
                        @include('partials._search', ['url' => '/waypoints'])
                    </div>
                </div>
                <div class="table-wrapper">
                    <table class="table table-striped text-center">

                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">title</th>
                                <th scope="col">short_description</th>
                                <th scope="col">long_description</th>
                                <th scope="col">latitude</th>
                                <th scope="col">longitude</th>
                                <th scope="col">actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($waypoints as $waypoint)
                                <tr>
                                    <td>
                                        {{ $waypoint->id }}
                                    </td>
                                    <td>
                                        {{ $waypoint->title }}
                                    </td>
                                    <td>
                                        <?php
                                        $desc = $waypoint->short_description;
                                        if (strlen($desc) > 100) {
                                            $desc = substr($desc, 0, strrpos(substr($desc, 0, 100), ' ')) . ' ...';
                                        }
                                        echo $desc;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $desc = $waypoint->long_description;
                                        if (strlen($desc) > 100) {
                                            $desc = substr($desc, 0, strrpos(substr($desc, 0, 100), ' ')) . ' ...';
                                        }
                                        echo $desc;
                                        ?>
                                    </td>
                                    <td>
                                        {{ $waypoint->latitude }}
                                    </td>
                                    <td>
                                        {{ $waypoint->longitude }}
                                    </td>

                                    <td>
                                        <ul
                                            class="list-group list-group-horizontal list-unstyled rounded-3 actions d-flex justify-content-center">
                                            <li class="list-group-item">
                                                <form method="GET" action="/waypoints/{{ $waypoint->id }}">
                                                    <button class="show">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </button>

                                                </form>
                                            </li>
                                            <li class="list-group-item">
                                                <form method="GET" action="/waypoints/{{ $waypoint->id }}/edit">
                                                    <button class="edit">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>
                                                </form>
                                            </li>
                                            <li class="list-group-item">
                                                <form method="POST" action="/waypoints/{{ $waypoint->id }}">
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
                @if (count($waypoints) == 0)
                    <p class="text-center">Keine Waypoints gefunden.</p>
                @endif
            </div>
        </div>
        <div class="mt-4">
            {{ $waypoints->links() }}
        </div>
    </div>
@endsection
