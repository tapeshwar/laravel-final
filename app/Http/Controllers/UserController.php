<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
class UserController extends Controller
{
    
    public function user_login(Request $request){  
        /* $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]); */

        $this->validate(
            $request, 
            [   
                'username'  => 'required',
                'password'  => 'required'
            ],
            [   
                'username.required' => 'Username is required',
                'password.required' => 'Password is required',
            ]
        );
        
        $remember_me = $request->has('remember_me') ? true : false;
        $username = $request->post('username');
        $password = $request->post('password');

        //echo Hash::make($password);die;
       
        if (Auth::attempt(['username' => $username, 'password' => $password, 'active' => 1],$remember_me)) {
            $request->session()->regenerate();
            Session::flash('message', 'Login successfully..'); 
            Session::flash('alert-class', 'alert-success');
            return redirect()->intended('home/index');   
        }else{
            Session::flash('message', 'Invalid credentials');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back()->withInput();
            //return redirect('/');
        } 
    
    }


    public function logout(Request $request){ 	
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    
}
