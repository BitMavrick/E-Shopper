<x-seller.master>
    <x-slot name="title">
        {{ $title ?? 'Shop Create | E-Shopper' }}
    </x-slot>

    <div class="content-wrapper">

        <div class="card-body">
            <h4 class="card-title">Create Shop</h4>

            <a href="{{ route('seller.shop') }}" class="btn btn-secondary font-weight-bold my-4">
                <- Go to List </a>
                    <hr>
                    <form class="forms-sample" action="{{ route('shops.store') }}" method="post">
                        @csrf
                        <input type="text" name="user_id" hidden value="{{ Auth::user()->id}}">

                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Shop Title</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="exampleInputUsername2"
                                    placeholder="Enter shop title" name="name" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Slug</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="exampleInputEmail2" name="slug"
                                    placeholder="Short motive about the shop" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputAddress" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="exampleInputAddress" name="address"
                                    placeholder="Physical Shop address" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" name="phone" id="exampleInputMobile"
                                    placeholder="Mobile number" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputEmail" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" required class="form-control" id="exampleInputEmail" name="email"
                                    placeholder="Email for shop" />
                            </div>
                        </div>

                        <input type="text" name="verified" hidden value="0">

                        <button type="submit" class="btn btn-info mr-2">
                            Create
                        </button>
                        <button type="reset" class="btn btn-light">Discard all</button>
                    </form>
        </div>
    </div>

</x-seller.master>