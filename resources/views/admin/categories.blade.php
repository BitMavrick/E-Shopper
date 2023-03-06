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

            <button type="button" class="btn btn-info font-weight-bold my-4">+ Create New</button>

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
                                Total Items
                            </th>
                            <th>
                                Progress
                            </th>
                            <th>
                                Total Sale
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>
                                <strong> {{ $category->name }}</strong>
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
                                <button class="btn btn-info mr-3">Update</button>
                                @if( count($category->product) == 0)
                                <button class="btn btn-danger">Remove</button>
                                @else
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