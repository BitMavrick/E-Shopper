<x-user.master>

    <x-slot name="title">
        {{ $title ?? 'Shop | E-Shopper' }}
    </x-slot>

    <x-user.partials.register />
    <x-user.partials.topnav />

    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">
                {{ $shop->name }}
            </h1>
            <p>{{ $shop->slug }}</p>
            <a href="tel:{{ $shop->phone }}">{{ $shop->phone }}</a>
            <a href="mailto:{{ $shop->email }}">{{ $shop->email }}</a>
            <p>{{ $shop->address }}</p>
        </div>
    </div>

    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">

                            <h5 class="font-weight-semi-bold mb-4">
                                All Products:
                            </h5>

                            <div class="dropdown ml-4">

                                <form action="">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search by name" />
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-transparent text-primary">
                                                <i class="fa fa-search"></i>
                                            </span>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    @foreach($products as $product)
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <a href="{{ route('product', $product->id) }}"><img class="img-fluid w-100" src="/storage/img/{{$product->image}}" alt="product-image" /></a>

                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">
                                    {{ $product->name }}
                                </h6>
                                <div class="d-flex justify-content-center">
                                    <h6>৳ {{ $product->price }}</h6>
                                    @if($product->prev_price != null)
                                    <h6 class="text-muted ml-2">
                                        <del>৳ {{ $product->prev_price }}</del>
                                    </h6>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="{{ route('product', $product->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    @endforeach


                    <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center mb-3">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->

    <x-user.partials.footer />
</x-user.master>