<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

class UsersController extends Controller
{
    public function list(Request $re) {
        $users = User::search($re->name)
            ->orderBy('name','asc')
            ->paginate(15);
        return view('app/users/list')->with(['users'=> $users]);
    }
}
