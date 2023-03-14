<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;
        $user->status = $request->status;
        $user->save();

        if ($request->type == 'seller')
            return redirect()->route('admin.sellers');
        else if ($request->type == 'admin')
            return redirect()->route('admin.admins');
        else if ($request->type == 'user') {
            return redirect()->route('admin.users');
        }
    }

    public function seller_request(Request $request)
    {
        if (auth()->user()->id == $request->id) {
            $user = User::find($request->id);

            $user->status = 'pen';
            $user->save();

            session()->flash('message', 'Success! The request is successfully accepted and its pending for approval! Please wait until its approved. Thank you.');
            session()->flash('alert-type', 'alert-success');
            return redirect()->back();
        }

        session()->flash('message', 'Sorry! Something went wrong.');
        session()->flash('alert-type', 'alert-danger');
        return redirect()->back();
    }
}
