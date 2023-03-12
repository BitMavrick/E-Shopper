<x-admin.master>
    <x-slot name="title">
        {{ $title ?? 'Products | E-Shopper' }}
    </x-slot>

    <div class="content-wrapper">

        <div class="card-body">
            <h4 class="card-title">Create Product</h4>

            <a href="{{ route('products.index') }}" class="btn btn-secondary font-weight-bold my-4">
                <- Go to List </a>
                    <hr>

                    <form class="forms-sample" action="{{ route('products.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="shop_id" class="col-sm-3 col-form-label">Select shop</label>
                            <div class="col mt-2">
                                <select class="form-control" id="shop_id" required name="shop_id">
                                    <option selected disabled>Select shop</option>
                                    @foreach($shops as $shop)
                                    <option value="{{ $shop->id }}">{{ $shop->name }} - Owner:
                                        {{ $shop->user->name }} ({{ $shop->user->email }})
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" required class="form-control" id="image" name="image"
                                    placeholder="Insert image" />
                                <small style="color: red;">The ideal ratio of the product will be square. The image will
                                    be
                                    crop
                                    to maintain the exact ratio</small>
                            </div>


                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="name"
                                    placeholder="Enter the product name" name="name" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="owner" class="col-sm-3 col-form-label">Category</label>
                            <div class="col mt-2">
                                <select class="form-control" id="owner" required name="category_id">
                                    <option selected disabled>Select product category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }} - ({{ $category->slug }})
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="brand" class="col-sm-3 col-form-label">Brand</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="brand" name="brand"
                                    placeholder="Enter brand name" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="variant" class="col-sm-3 col-form-label">Variant</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="variant" name="variant"
                                    placeholder="Enter model/color/variant/size etc." />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Quantity" class="col-sm-3 col-form-label">Quantity</label>
                            <div class="col-sm-9">
                                <input type="number" required class="form-control" id="Quantity" name="quantity"
                                    placeholder="Enter the product's quantity" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-9">
                                <input type="number" required class="form-control" id="price" name="price"
                                    placeholder="Enter the product's price in Bangladeshi Taka" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prev_price" class="col-sm-3 col-form-label">Previous Price
                                (Optional)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="prev_price" id="prev_price"
                                    placeholder="Enter the product's previous price in Bangladeshi Taka" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="short_description" class="col-sm-3 col-form-label">Short Description</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="short_description"
                                    name="short_description"
                                    placeholder="Write a short description about the product" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control editor1" required name="description" id="editor" rows="6"
                                    placeholder="Proper description of the product"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="specification" class="col-sm-3 col-form-label">Specification</label>
                            <div class="col-sm-9">
                                <textarea class="form-control editor2" required name="specification" id="editor"
                                    rows="7" placeholder="Enter specification of the product"></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info mr-2">
                            Create
                        </button>
                        <button type="reset" class="btn btn-light">Discard all</button>
                    </form>
        </div>
    </div>

    <script>
    ClassicEditor
        .create(document.querySelector('.editor1'))
        .catch(error => {
            console.error(error);
        });
    </script>

    <script>
    ClassicEditor
        .create(document.querySelector('.editor2'))
        .catch(error => {
            console.error(error);
        });
    </script>



</x-admin.master>