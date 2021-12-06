<?php

namespace App\Http\Controllers\Projects;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProjectsController extends Controller
{
    
    public function index(){
        
        if (Auth::check()==FALSE) {
            return redirect('/');
        }
        
        $user_id = session('id');
        $projects = DB::table('project')->where('assigned_user', 'like', '%'.$user_id.'%')->get()->map(function ($item, $key) {
            return (array) $item;
        })->all();
        //$projects = $query->toArray();
        $ret_data = [
			'title' => (!empty(session('project_key'))) ? session('project_name') : 'Manage Projects',
			'heading' => (!empty(session('project_key'))) ? session('project_name') : 'Manage Projects',
            'siteURL' => (!empty($projects)) ? $projects : NULL,
		];
        return view('template/template_dashboard',$ret_data);

    }


    public function enter(Request $request){
        if (Auth::check()==FALSE) {
            return redirect('/');
        }
        
        if(!empty($request->post())){
            $post = $request->post();
            Session::put('project_key', $post['projectkey']);
            Session::put('project_name', $post['projectname']);
            Session::put('project_domain', $post['projectdomain']);
            return redirect('projects/index');
        }

    }


    public function change_project(){

        if (Auth::check()==FALSE) {
            return redirect('/');
        }
        Session::forget('project_key'); 
        Session::forget('project_name'); 
        Session::forget('project_domain'); 
        return redirect('projects/index');
    }
}
