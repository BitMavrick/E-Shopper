<x-user.master>

    <x-slot name="title">
        {{ $title ?? 'Home | E-Shopper' }}
    </x-slot>

    <x-user.partials.register />

    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="{{ route('home') }}" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold">
                        <span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper
                    </h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products" />
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge" style="color: gray;">0</span>
                </a>
                <a href="" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge" style="color: gray;">0</span>
                </a>
            </div>
        </div>
        @if(session('message'))
        <div class="alert {{session('alert-type')}} alert-dismissible fade show mx-5" role="alert">
            {{ session('message')  }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>

    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                    data-toggle="collapse" href="#navbar-vertical"
                    style="height: 65px; margin-top: -1px; padding: 0 30px">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
                    id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        @foreach($categories as $category)
                        <a href="#" class="nav-item nav-link">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold">
                            <span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper
                        </h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{ route('home') }}" class="nav-item nav-link">Home</a>
                            <a href="detail.html" class="nav-item nav-link">Explore</a>
                            <a href="shop.html" class="nav-item nav-link active">Your Feed</a>
                            <a href="{{ route('contact') }}" class="nav-item nav-link">Contact Us</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            @if(Auth::user())
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle"
                                    data-toggle="dropdown">{{ Auth::user()->name}}</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="{{ route('manage-account') }}" class="dropdown-item">Manage Account</a>
                                    <a href="cart.html" class="dropdown-item">Orders</a>
                                    <a href="cart.html" class="dropdown-item">Wishlist</a>
                                    <a href="cart.html" class="dropdown-item">Reviews</a>

                                    <form action="{{route('logout')}}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Sign Out</button>
                                    </form>
                                </div>
                            </div>
                            @else
                            <a href="" class="nav-item nav-link" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Login/Register</a>
                            @endif
                        </div>
                    </div>
                </nav>
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px">
                            <img class="img-fluid" src="/user/img/carousel-1.jpg" alt="Image" />
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">
                                        10% Off Your First Order
                                    </h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">
                                        Fashionable Dress
                                    </h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px">
                            <img class="img-fluid" src="/user/img/carousel-2.jpg" alt="Image" />
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">
                                        10% Off Your First Order
                                    </h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">
                                        Reasonable Price
                                    </h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <x-user.partials.featured />

    <x-user.partials.categories />
    <x-user.partials.offer />
    <x-user.partials.trend />
    <x-user.partials.subscribe />
    <x-user.partials.new />
    <x-user.partials.vendor />
    <x-user.partials.footer />
</x-user.master>