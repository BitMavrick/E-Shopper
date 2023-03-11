<x-admin.master>
    <x-slot name="title">
        {{ $title ?? 'User | E-Shopper' }}
    </x-slot>

    <div class="content-wrapper">

        <div class="card-body">
            <h4 class="card-title">User Details</h4>
            <hr>

            <form class="forms-sample" action="#" method="post">
                @csrf
                @method('PATCH')

                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" required class="form-control" id="name" placeholder="Enter name" name="name"
                            value="{{ $user->name }}" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" required class="form-control" id="email" placeholder="Enter email"
                            name="email" value="{{ $user->email }}" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="type" class="col-sm-3 col-form-label">Type</label>
                    <div class="col mt-2">
                        <select class="form-control" id="type" required name="type">

                            @if($user->type == 'admin')
                            <option style="color: red;" selected value="{{$user->type}}">Admin</option>
                            <option value="user">User</option>
                            <option value="seller">Seller</option>
                            @elseif($user->type == 'seller')
                            <option style="color: red;" selected value="{{$user->type}}">Seller</option>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                            @elseif($user->type == 'user')
                            <option style="color: red;" selected value="{{$user->type}}">User</option>
                            <option value="seller">Seller</option>
                            <option value="admin">Admin</option>
                            @endif

                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Status</label>
                    <div class="col mt-2">
                        <select class="form-control" id="status" required name="status">

                            @if($user->status == 'nor')
                            <option style="color: red;" selected value="{{$user->status}}">Normal</option>
                            <option value="ver">Verified</option>
                            <option value="ban">Banned</option>
                            <option value="pen">Pending seller request</option>
                            @elseif($user->status == 'ver')
                            <option style="color: red;" selected value="{{$user->status}}">Verified</option>
                            <option value="nor">Normal</option>
                            <option value="ban">Banned</option>
                            <option value="pen">Pending seller request</option>
                            @elseif($user->status == 'pen')
                            <option style="color: red;" selected value="{{$user->status}}">Pending seller request
                            </option>
                            <option value="nor">Normal</option>
                            <option value="ver">Verified</option>
                            <option value="ban">Banned</option>
                            @elseif($user->status == 'ban')
                            <option style="color: red;" selected value="{{$user->status}}">Banned</option>
                            <option value="nor">Normal</option>
                            <option value="ver">Verified</option>
                            <option value="pen">Pending seller request</option>
                            @endif

                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-info mr-2">
                    Save changes
                </button>

            </form>
        </div>
    </div>

</x-admin.master>