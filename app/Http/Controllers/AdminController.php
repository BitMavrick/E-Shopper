<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        $users = User::where('type', 'user')->get();

        view()->share('users', $users);
        return view('admin.users');
    }

    public function sellers()
    {
        $users = User::where('type', 'seller')->get();

        view()->share('users', $users);
        return view('admin.sellers');
    }

    public function admins()
    {
        $users = User::where('type', 'admin')->get();

        view()->share('users', $users);
        return view('admin.admins');
    }

    public function requests()
    {
        /*
        pen = Pending for become seller
        per = Pending for become verified
        bot = Pending for become both seller and verified
        */

        $users = User::where('status', 'pen')->where('status', 'per')->where('status', 'bot')->get();

        view()->share('users', $users);
        return view('admin.requests');
    }
}