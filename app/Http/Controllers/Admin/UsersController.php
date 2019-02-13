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

    public function create() {
        return view('app/users/create');
    }

    public function store(Request $re) {

        $user = new User();

        $user->name = $re->name;
        $user->email = $re->email;
        $user->password = bcrypt($re->password);
        $user->phone = $re->phone;
        $user->status = $re->status;
        $user->user_type = $re->user_type;
        
        $user->save();

        return redirect('app/usuarios');

    }

    public function edit($id) {

        $user = User::find($id);
        if($user == NULL) return 'Registro no encontrado';
        return view('app/users/edit')->with('user', $user);

    }

    public function update(Request $re, $id) {

        $user = User::find($id);
        if($user == NULL) return 'Registro no encontrado';

        $user->name = $re->name;
        $user->email = $re->email;        
        $user->phone = $re->phone;
        $user->status = $re->status;
        $user->user_type = $re->user_type;
        if($re->password != NULL)
            $user->password = bcrypt($re->password);
        
        $user->save();

        return back()->with('msj', 'Usuario Actualizado');
        
    }

    public function destroy($id) {
        $user = User::find($id);
        if($user == NULL) return response()->json('msj', 'Registro no encontrado', 405);
        $user->delete();
        return response()->json(true);
    }

}
