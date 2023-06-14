<nav class="navbar navbar-expand-lg bg-white fixed-top shadow-sm py-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Havenspuren</a>
        <!--
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('routes.index') }}">Route</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link 2</a>
                </li>
            </ul>
        </div> -->
        @auth
            <div class="user">
                <i class="fa-solid fa-user-large fa-lg"></i> <strong>{{ auth()->user()->name }}</strong>
            </div>
            <form method="POST" action="/logout" class="logout-btn position-absolute end-0 me-2 d-none">
                @csrf
                <button class="btn btn-danger"><i class="fa-solid fa-arrow-right-from-bracket"></i>
                    Logout</button>
            </form>

        @endauth

    </div>
</nav>
