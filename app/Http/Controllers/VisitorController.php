<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Reset;

class VisitorController extends Controller
{
    //

    public function resetPassword(){
        return view('auth/passwords/email');
    }

    public function sentTokenReset(Request $request) {

        
        $user = User::where('email', 'LIKE', $request->email)->first();        

        if(isset($user->id)){

            $reset = new Reset();
            $reset->user_id = $user->id;
            $reset->token = hash('tiger192,3', rand(1000, 10000));
            $reset->save();

            $data = array(
                'token' => $reset->token,
                'email' => $user->email,
                'name' => $user->name
            );

            
            $request->token = $reset->token;
            $request->email = $user->email;
            $request->email = $user->email;

            $data = (object) $data;

            Mail::send(new ResetMail($data));

            Session::flash('success', 'asdf');
            return back();

        } else {

            Session::flash('errorEmail', 'asdf');
            return back();

        }
    }

    public function resetPassword2($token){

        $reset = Reset::where('token', 'LIKE', $token)->first();

        if(isset($reset->id)){

            $user = User::find($reset->user_id);
            return view('auth/passwords/reset')->with('email', $user->email);

        } else {

            return redirect('login');

        }

    }

    public function updatePassword($token, Request $re){

        $reset = Reset::where('token', 'LIKE', $token)->first();
        
        if(isset($reset->id)){
            $user = User::find($reset->user_id);
            $user->password =  bcrypt($re->password);
            $user->save();

            Auth::login($user);
            $reset->delete();
            
        } 
          
        return redirect('login');
        
    }

    public function login() {
        
        if (Auth::check()) {
            return redirect('app');
        }
        
        return view('visitor/login');
    }

    public function signin(Request $re) {
        $this->validate($re, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $re->email, 'password' => $re->password]) ) {

            if(Auth::user()->user_type < 4 || Auth::user()->status != 1) {

                Auth::logout(); 
                return back();
            }

            return redirect('/app');

        }

        return back();
    }

    public function redirectAnalisis() {

        if (Auth::check()) {
            $user = Auth::user();

            // if(U)
            return redirect('app/usuarios');
        }
        
        return view('visitor/login');

    }

    public function logout() {

        if (Auth::check()) Auth::logout(); 

        return redirect('login');

    }
}
