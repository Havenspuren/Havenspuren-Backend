<div class="modal fade" id="indexRouteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="indexRouteLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="indexRouteLabel">Indexierung der Route</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="/routes/{{ $route->id }}/waypoints/assign">
                @csrf
                <div class="modal-body" id="IndexRouteModalBody">

                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                            class="fa-solid fa-angle-left"></i> Abbrechen</button>-->
                    <button class="btn btn-primary"><i class="fa-solid fa-gears"></i> Zuordnen </button>
                </div>
            </form>
        </div>
    </div>
</div>
