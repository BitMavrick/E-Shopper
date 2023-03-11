<x-admin.master>
    <x-slot name="title">
        {{ $title ?? 'User | E-Shopper' }}
    </x-slot>

    <div class="content-wrapper">

        <div class="card-body">
            <h4 class="card-title">User Details</h4>



            <form action="{{ route('shops.destroy', $shop->id) }}" method="post">
                @csrf
                @method('DELETE')

                <a href="{{ route('shops.index') }}" class="btn btn-secondary font-weight-bold my-4">
                    <- Go to List </a>

                        <button class="btn btn-danger ml-4" type="submit"
                            onclick="return confirm('Are you sure you want to delete this shop? All the product of this shop will be removed!')">Delete
                            Shop</button>
            </form>

            <hr>

            <form class="forms-sample" action="{{ route('shops.update', $shop->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group row">
                    <label for="exampleSelectGender" class="col-sm-3 col-form-label">Owner</label>

                    <div class="col mt-2">
                        <select class="form-control" id="exampleSelectGender" name="user_id">
                            <option selected value="{{ $shop->user->id }}" style="color: red;">
                                {{ $shop->user->name }} - (
                                {{ $shop->user->email}} )
                            </option>
                            @foreach($users as $user)
                            @if($user->id != $shop->user->id)
                            <option value="{{ $user->id }}">{{ $user->name }} - ( {{$user->email}} )</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Shop Title</label>
                    <div class="col-sm-9">
                        <input type="text" required value="{{ $shop->name }}" class="form-control"
                            id="exampleInputUsername2" placeholder="Enter shop title" name="name" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Slug</label>
                    <div class="col-sm-9">
                        <input type="text" required value="{{ $shop->slug }}" class="form-control"
                            id="exampleInputEmail2" name="slug" placeholder="Short motive about the shop" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputAddress" class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                        <input type="text" required value="{{ $shop->address }}" class="form-control"
                            id="exampleInputAddress" name="address" placeholder="Physical Shop address" />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                    <div class="col-sm-9">
                        <input type="text" required value="{{ $shop->phone }}" class="form-control" name="phone"
                            id="exampleInputMobile" placeholder="Mobile number" />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputEmail" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" required value="{{ $shop->email }}" class="form-control"
                            id="exampleInputEmail" name="email" placeholder="Email for shop" />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Status</label>
                    @if($shop->verified == 1)
                    <div class="col-sm-4">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="verified" id="membershipRadios1"
                                    value="0" />
                                Normal
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="verified" id="membershipRadios2"
                                    value="1" checked />
                                Verified
                            </label>
                        </div>
                    </div>
                    @else

                    <div class="col-sm-4">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="verified" id="membershipRadios1"
                                    value="0" checked />
                                Normal
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="verified" id="membershipRadios2"
                                    value="1" />
                                Verified
                            </label>
                        </div>
                    </div>

                    @endif
                </div>

                <button type="submit" class="btn btn-info mr-2">
                    Save changes
                </button>

            </form>
        </div>
    </div>

</x-admin.master>