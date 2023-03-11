<x-admin.master>
    <x-slot name="title">
        {{ $title ?? 'Products | E-Shopper' }}
    </x-slot>

    <div class="content-wrapper">

        <div class="card-body">
            <h4 class="card-title">Product Details</h4>

            <form action="{{ route('products.destroy', $product->id) }}" method="post">
                @csrf
                @method('DELETE')

                <a href="{{ route('products.index') }}" class="btn btn-secondary font-weight-bold my-4">
                    <- Go to List </a>

                        <button class="btn btn-danger ml-4" type="submit" onclick="return confirm('Are you sure you want to delete this product?')">Delete
                            Product</button>
            </form>

            <hr>
            <form class="forms-sample" action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group row">
                    <label for="shop_id" class="col-sm-3 col-form-label">Select shop</label>
                    <div class="col mt-2">
                        <select class="form-control" id="shop_id" required name="shop_id">
                            <option selected value="{{ $product->shop->id }}" style="color: red;">
                                {{ $product->shop->name }} - Owner: {{ $product->shop->user->name }}
                                ({{ $product->shop->user->email }})
                            </option>
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

                        <img style="width: 300px;" class="mb-3" src="/storage/img/{{$product->image}}" alt="">

                        <input type="file" class="form-control" id="image" name="image" placeholder="Insert image" />
                        <small style="color: red;">Leave image field empty if you dont want to update image</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" required class="form-control" id="name" placeholder="Enter the product name" name="name" value="{{ $product->name }}" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="owner" class="col-sm-3 col-form-label">Category</label>
                    <div class="col mt-2">
                        <select class="form-control" id="owner" required name="category_id">
                            <option selected style="color: red;" value="{{ $product->category->id }}">
                                {{ $product->category->name }} -
                                ({{ $product->category->slug }})
                            </option>
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
                        <input type="text" required class="form-control" id="brand" name="brand" placeholder="Enter brand name" value="{{ $product->brand }}" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="variant" class="col-sm-3 col-form-label">Variant</label>
                    <div class="col-sm-9">
                        <input type="text" required class="form-control" id="variant" name="variant" placeholder="Enter model/color/variant/size etc." value="{{ $product->variant }}" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Quantity" class="col-sm-3 col-form-label">Quantity</label>
                    <div class="col-sm-9">
                        <input type="number" required class="form-control" id="Quantity" name="quantity" placeholder="Enter the product's quantity" value="{{ $product->quantity }}" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-sm-3 col-form-label">Price</label>
                    <div class="col-sm-9">
                        <input type="number" required class="form-control" id="price" name="price" placeholder="Enter the product's price in Bangladeshi Taka" value="{{ $product->price }}" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="prev_price" class="col-sm-3 col-form-label">Previous Price
                        (Optional)</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="prev_price" id="prev_price" placeholder="Enter the product's previous price in Bangladeshi Taka" value="{{ $product->prev_price }}" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="short_description" class="col-sm-3 col-form-label">Short Description</label>
                    <div class="col-sm-9">
                        <input type="text" required class="form-control" id="short_description" name="short_description" placeholder="Write a short description about the product" value="{{ $product->Short_description }}" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" required name="description" id="description" rows="6" placeholder="Proper description of the product">{{ $product->description }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="specification" class="col-sm-3 col-form-label">Specification</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" required name="specification" id="specification" rows="7" placeholder="Enter specification of the product">{{ $product->specification }}</textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-info mr-2">
                    Save changes
                </button>
            </form>
        </div>
    </div>

</x-admin.master>