<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
}
