<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
        <a class="navbar-brand text-or" style="color: #fb8500;" href="/">Money<strong>Manager</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    
                </li>
            </ul>
            @guest
                <div class="d-flex align-items-center" >
                    <a href="/login" class="me-4 text-decoration-none" style="color: #fb8500;">Login</a>
                    <p class="p-0 m-0 me-1 fw-bold" style="color: #fb8500;">|</p>
                    <a href="/register" style="color: #fb8500;">
                        <button class="btn" style="color: #fb8500;">Register</button>
                    </a>
                </div>
            @endguest

            @auth
            <form action="/logout" method="POST">
                @csrf
                <button class="btn btn-orange" type="submit">Logout</button>
            </form>
            @endauth
        </div>
    </div>
</nav>
