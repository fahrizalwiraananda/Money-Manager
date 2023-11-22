<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">MoneyManager</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/eva">Form Hobi</a>
                </li>
            </ul>
            @guest
                <div class="d-flex align-items-center">
                    <a href="/login" class="me-4 text-decoration-none">Login</a>
                    <a href="/register">
                        <button class="btn btn-outline-primary">Register</button>
                    </a>
                </div>
            @endguest

            @auth
            <form action="/logout" method="POST">
                @csrf
                <button class="btn btn-danger" type="submit">Logout</button>
            </form>
            @endauth
        </div>
    </div>
</nav>
