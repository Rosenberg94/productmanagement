<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-articles bg-dark-grey">
    <div class="container-fluid" >
        <a class="navbar-brand" href="{{route('main')}}"><h3 class="txt-clr">Product management</h3></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <h6 class="txt-clr">Pages</h6>
                    </a>
                    <ul class="dropdown-menu bg-grey" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('main')}}">All products</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('manufacturer_list')}}">Manufacturers</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('categories')}}">Categories</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('manage')}}">Download all products</a></li>
                    </ul>
                </li>
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <h6 class="txt-clr">Create</h6>
                    </a>
                    <ul class="dropdown-menu bg-grey" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('create')}}">Add a new product</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('manufacturer_create')}}">New manufacturer</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('products_import')}}">Import products by excel</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('category_create_form')}}">Create category</a></li>
                    </ul>
                </li>
                @endauth
                @isset($categories)
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <h6 class="txt-clr">Category</h6>
                        </a>
                        <ul class="dropdown-menu bg-grey" aria-labelledby="navbarDropdown">
                            @foreach($categories as $category)
                                <li><a class="dropdown-item" href="{{route('main', ['category_id' => $category->id])}}">{{$category->name}}</a></li>
                                <li><hr class="dropdown-divider"></li>
                            @endforeach
                        </ul>
                    </div>
                @endisset
                @auth()
                    <div class="mt-2">
{{--                        <a href="{{ route( 'profile')}}" class="non-dcr">--}}
                            <h6 class="txt-clr">{{auth()->user()->name}}</h6>
{{--                        </a>--}}
                    </div>
                @endauth
            </ul>
            <div class="d-flex">
                <div class="container">
                    @auth
                        <div class="form-group row mt-3">
                            <div class="col-md-3">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-secondary">
                                        <h6 class="txt-clr">Logout</h6>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-secondary">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>

