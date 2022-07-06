<!-- Nav Code -->
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container-sm">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('posts.index')}}">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('categories.index')}}">Categories</a>
                </li>
            </ul>

            <ul class="navbar-nav mb-2 mb-lg-0">

                @if(Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{route('posts.create')}}">Create A Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('my-posts.index')}}">My Post</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link fw-bold dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{route('logout')}}" method="POST" onclick="return confirm('Logout Your Account! Are you sure?')">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                            
                        </li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login.create')}}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register.create')}}">Register</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>