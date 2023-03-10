<x-admin.master>
    <x-slot name="title">
        {{ $title ?? 'Products | E-Shopper' }}
    </x-slot>

    <div class="content-wrapper">
        <div class="card-body">
            <h4 class="card-title">Products List</h4>
            <p class="card-description">
                Total Products: <code> {{ count($products) }} </code>
            </p>

            <!-- Button trigger modal -->
            <a class="btn btn-info font-weight-bold my-4" href="{{ route('products.create') }}">
                + Create
                New
            </a>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>
                                PK
                            </th>
                            <th>
                                Title
                            </th>
                            <th>
                                Price
                            </th>
                            <th>
                                Category
                            </th>
                            <th>
                                Shop
                            </th>
                            <th>
                                Total Items
                            </th>
                            <th>
                                Total Sold
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                <strong> {{ $product->name }}</strong>
                            </td>

                            <td>
                                <strong> {{ $product->price }} BDT</strong>
                            </td>

                            <td>
                                <strong> {{ $product->category->name }}</strong>
                            </td>

                            <td>
                                <strong> {{ $product->shop->name }} </strong>
                            </td>

                            <td>
                                $0
                            </td>
                            <td>
                                <label class="badge badge-success">Active</label>
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ route('products.edit', $product->id) }}">See more</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>



</x-admin.master>