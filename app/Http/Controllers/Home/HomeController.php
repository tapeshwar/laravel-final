<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    
    public function __construct(){
        $this->append_js = ['test.js','test2.js'];
        $this->append_css = ['test.css','test2.css'];
 
    }
    
    public function index(Request $request){

        $user = Auth::user();
        $id = Auth::id();
        
        if (Auth::check()==FALSE) {
            return redirect('/');
        }

        //dd($this->js);
        //echo get_name('TEst Name');die('dfsa');

        //Auth::login($user);
        
        /* if(empty($request->session()->has('user_info'))){
            return redirect('/');
        } */
        //$value = $request->session()->get('user_info');
        //print_r($value);   
        $ret_data['heading'] = 'Dashboard';
        $ret_data['append_js'] = $this->append_js;
        $ret_data['append_css'] = $this->append_css;
        
        return view('template/template_dashboard',$ret_data);
        
    }

}
