<x-admin.master>
    <x-slot name="title">
        {{ $title ?? 'Categories | E-Shopper' }}
    </x-slot>

    <div class="content-wrapper">
        <div class="card-body">
            <h4 class="card-title">Categories List</h4>
            <p class="card-description">
                Total categories: <code> {{ count($categories) }} </code>
            </p>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-info font-weight-bold my-4" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop">
                + Create
                New
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">New Categoty</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('categories.store') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="name" class="form-control" id="title"
                                        aria-describedby="emailHelp" required>
                                </div>

                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" name="slug" class="form-control" id="slug"
                                        aria-describedby="emailHelp" required>
                                    <div id="emailHelp" class="form-text">Write little something about the category.
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-info">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>
                                PK
                            </th>
                            <th>
                                Title & Slug
                            </th>
                            <th>
                                Total Items
                            </th>
                            <th>
                                Sales graph
                            </th>
                            <th>
                                Total Sale
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>
                                <strong> {{ $category->name }} </strong> ({{ $category->slug }})
                            </td>

                            <td>
                                <strong> {{ count($category->product) }} </strong>
                            </td>

                            <td>
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 75%"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                            <td>
                                $0
                            </td>

                            <td>
                                <div class="modal fade" id="staticBackdrop{{ $category->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Update Categoty</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('categories.update', $category->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PATCH')

                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Title</label>
                                                        <input type="text" name="name" class="form-control" id="title"
                                                            aria-describedby="emailHelp" value="{{ $category->name }}"
                                                            required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="slug" class="form-label">Slug</label>
                                                        <input type="text" name="slug" class="form-control" id="slug"
                                                            aria-describedby="emailHelp" value="{{ $category->slug }}"
                                                            required>
                                                        <div id="emailHelp" class="form-text">Write little something
                                                            about the category.
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-info">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if( count($category->product) == 0)
                                <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-info mr-3" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop{{ $category->id }}">Update</a>
                                    <button class="btn btn-danger" type="submit"
                                        onclick="return confirm('Are you sure you want to delete this category?')">Remove</button>
                                </form>

                                @else
                                <button class="btn btn-info mr-3" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop{{ $category->id }}">Update</button>
                                <button type="button" disabled class="btn btn-danger">
                                    Remove
                                </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>



</x-admin.master>