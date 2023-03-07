<x-admin.master>
    <x-slot name="title">
        {{ $title ?? 'Shops | E-Shopper' }}
    </x-slot>

    <div class="content-wrapper">

        <div class="card-body">
            <h4 class="card-title">Create Shop</h4>


            <a href="{{ route('shops.index') }}" class="btn btn-secondary font-weight-bold my-4">
                <- Go to List </a>
                    <hr>

                    <form class="forms-sample">
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputUsername2"
                                    placeholder="Username" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputMobile"
                                    placeholder="Mobile number" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="exampleInputPassword2"
                                    placeholder="Password" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re
                                Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="exampleInputConfirmPassword2"
                                    placeholder="Password" />
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info mr-2">
                            Create
                        </button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
        </div>
    </div>



</x-admin.master>