<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    
    public function user_login(Request $request){
        $username = $request->post('username');
        $password = $request->post('password');

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt(['username' => $username, 'password' => $password, 'active' => 1])) {
            $request->session()->regenerate();
           // return redirect()->intended('home/index');
            $return['url'] = 'home/index';
            $return['status'] = 'success';
            $return['msg'] = 'Login Successfully...';
            return $return;
            exit();
        }else{
            $return['status'] = 'error';
			$return['msg'] = 'Invalid credentials';
            return $return;
            exit();
        }
       
        /* $user = DB::table('users')->where('username', $username)->first();
        if(!empty($user)){
            $saved_password = $user->password;

            if(password_verify($password,$saved_password)){
                $user_info = ['id' => $user->id,'username' => $user->username,'email' => $user->email,'mobile'=>$user->mobile];
                $request->session()->push('user_info', $user_info);

                $return['url'] = 'home/index';
                $return['status'] = 'success';
                $return['msg'] = 'Login Successfully...';
                return $return;
            }else{
                $return['status'] = 'error';
			    $return['msg'] = 'Incorrect password';
                return $return;
            }
        }else{
            $return['status'] = 'error';
			$return['msg'] = 'Invalid username';
            return $return;
        } */
    
    }


    public function logout(Request $request){ 	
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    
}
