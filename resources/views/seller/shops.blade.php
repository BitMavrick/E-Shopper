<x-seller.master>
    <x-slot name="title">
        {{ $title ?? 'Products | E-Shopper' }}
    </x-slot>

    <div class="content-wrapper">
        <div class="card-body">
            <h4 class="card-title">Shops List</h4>
            <p class="card-description">
                Total Shops: <code> {{ count($shops) }} </code>
            </p>

            <a href="{{ route('shops.create') }}" class="btn btn-info font-weight-bold my-4">
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
                                Status
                            </th>
                            <th>
                                Products
                            </th>
                            <th>
                                Progress
                            </th>
                            <th>
                                Total Sales
                            </th>

                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($shops as $shop)
                        <tr>
                            <td>{{ $shop->id }}</td>
                            <td>
                                <strong> {{ $shop->name }}</strong>
                            </td>

                            <td>
                                @if($shop->verified == 0)
                                <label class="badge badge-info">Normal</label>
                                @elseif($shop->verified == 1)
                                <label class="badge badge-success">Verified</label>
                                @endif
                            </td>

                            <td>
                                {{ count($shop->product) }}
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
                                <a class="btn btn-info" href="{{ route('shops.edit', $shop->id) }}">See more</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</x-seller.master>