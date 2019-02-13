<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\UserAssosiation;

class UserAssosiationsController extends Controller
{
    public function list(Request $re) {
        $users = User::search($re->name)
            ->where('user_type', 1)
            ->with('assosiations:id,user_id')
            ->orderBy('name','asc')
            ->paginate(15);
        return view('app/assosiations/list')->with(['users'=> $users]);
    }

    public function create($id) {
        $user = User::find($id);
        return view('app/assosiations/create')->with(['user'=> $user]);
    }

    public function store(Request $re, $id) {

        $assosiation = new UserAssosiation();
        $assosiation->user_id = $id;
        $assosiation->assosiated_id = $re->assosiated_id;
        $assosiation->confirmed = true;
        $assosiation->save();

        return redirect('app/asosiaciones')->with('msj', 'Nueva asosiacion registrada correctamente');

    }

    public function sugest(Request $re) {
        return response()->json(
            User::search($re->term)
            ->where('user_type', '>', 1)
            ->limit(8)
            ->get()
        );
    }
}
