<x-user.master>

    <x-slot name="title">
        {{ $title ?? 'Cart | E-Shopper' }}
    </x-slot>

    <x-user.partials.register />
    <x-user.partials.topnav />

    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3 m-1">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Account Settings</h4>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Options</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Become a seller</td>
                                    @if(auth::user()->status == 'pen')
                                    <td> <button disabled class="btn btn-primary">Applied</button> </td>
                                    @elseif(auth::user()->status == 'ver')
                                    <td> <button disabled class="btn btn-primary">You already have seller
                                            access</button> </td>
                                    @elseif(auth::user()->status == 'nor')
                                    <td> <button class="btn btn-primary">Apply</button> </td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-user.partials.footer />
</x-user.master>