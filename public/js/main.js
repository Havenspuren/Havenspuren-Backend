window.onload = function () {
    var indexRouteButton = document.getElementById("indexRouteButton");

    indexRouteButton.addEventListener("click", function () {
        var checkboxes = document.querySelectorAll(
            'input[name="waypoint[]"]:checked'
        );

        var waypoints = [];

        checkboxes.forEach(function (checkbox) {
            var waypoint = {
                id: checkbox.value,
                title: checkbox.getAttribute("input-title"),
                index: checkbox.getAttribute("input-index"),
            };
            waypoints.push(waypoint);
        });

        var html = "";

        waypoints.forEach(function (waypoint) {
            html += '<div class="mb-3">';
            html +=
                '<label for="' +
                waypoint["id"] +
                '">' +
                waypoint["title"] +
                "</label>";
            html +=
                '<input type="text" class="form-control" name="waypoint_order[]" value="' +
                waypoint["index"] +
                '">';
            html +=
                '<input type="hidden" name="waypoint_id[]" value="' +
                waypoint["id"] +
                '">';
            html += "</div>";
        });

        var modalBody = document.getElementById("IndexRouteModalBody");

        modalBody.innerHTML = html;
    });
};

document.addEventListener("DOMContentLoaded", function () {
    var user = document.querySelector(".user");
    var logoutBtn = document.querySelector(".logout-btn");

    user.addEventListener("click", function () {
        user.classList.toggle("clicked");
        logoutBtn.classList.toggle("d-none");
    });
});
