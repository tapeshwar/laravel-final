<?php

namespace App\Http\Controllers\Rolepermission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;


class RolepermissionController extends Controller
{
    public function __construct() {
        $this->append_js = ['rolepermission.js'];
        //$this->append_css = ['test.css','test2.css'];
        DB::enableQueryLog();
    }

    public function module(Request $request){
         //echo 'test';die;
        if (Auth::check()==FALSE) {
            return redirect('/');
        }

        /* $where = '';
        if(!empty($request->get('q'))){
            $heading = $request->get('q');
            $where['module_name'] = $heading;
        } */
        //dd(DB::getQueryLog());die;
        $modules = DB::table('modules')->orderBy('id', 'asc')->paginate(10);
       
        //$pages = DB::table('page')->where($where)->orderBy('id', 'desc')->paginate(10);
        //$modules = DB::table('modules')->orderBy('id', 'asc')->get();

		$data = [
			'title' => 'Manage Modules',
			'heading' => 'Manage Modules',
            'modules' => $modules,
            'append_js' => $this->append_js	
		];

        return view('template/template_dashboard',$data);	
    }


    public function reload_modules(Request $request){
        $post = $request->post();
        
        if (Auth::check()==FALSE) {
            return redirect('/');
        }

        //DB::table('modules')->truncate();
        
        $i = 0;
        $routeCollection = Route::getRoutes();
        foreach ($routeCollection as $value) {
            $data['http_method'] = $value->methods()[0];
            $data['route'] = $value->uri();
            $data['action'] = $value->getActionName();
            $data['update_at'] = date('Y-m-d H:i:s');
            
            //$get_module = DB::table('modules')->where($data)->first();
            if(!empty($post['route'][$i])){
                if($value->uri() != $post['route'][$i]){
                    DB::table('modules')->where('route', $post['route'][$i])->update($data);
                    //dd(DB::getQueryLog());
                }
            }else{
                $data['display_name'] = 'Test';
                DB::table('modules')->insert($data);
            }

            $i++;
        }
        return redirect('rolepermission/module');
    }

    public function add_modules(Request $request){
        
        if (Auth::check()==FALSE) {
            return redirect('/');
        }
      


        $routeCollection = Route::getRoutes();
        $sections = [];
        foreach ($routeCollection as $value) {
            
            $sections[] = $value->getActionName();
            //$class_name =  class_basename($value->getActionName());
            //echo $class = substr(strtolower($class_name), 0, -10);
            //die;
        }
      
        $data = [
			'title' => 'Add Modules',
			'heading' => 'Add Modules',
            'sections' => $sections
		];
        return view('rolepermission/add_modules_modal',$data);	
    }

    public function store_modules(Request $request){

        if (Auth::check()==FALSE) {
            return redirect('/');
        }
        
        $post = $request->post();
        if(!empty($request->post())){
            $data['module_name'] = $post['module_name'];
            $data['section_name'] = $post['section_name'];
            $data['controller_name'] = $post['controller_name'];
            $data['method_name'] = $post['method_name'];
            $data['update_at'] = date('Y-m-d H:i:s');


            $check_method_name = DB::table('modules')->where('method_name', $post['method_name'])->count();
            //dd(DB::getQueryLog());
            if($check_method_name>0){
                echo 'duplicate';
                exit(); 
            }
            DB::table('modules')->insert($data);
            echo 'success';
            exit();
        }
    }


    public function edit_module(Request $request,$eid=NULL){

        if(!empty($eid)){
            $module = DB::table('modules')->where('id', $eid)->first(); 
        }
       
        $routeCollection = Route::getRoutes();
        $sections = [];
        foreach ($routeCollection as $value) {
            $sections[] = $value->getActionName();
        }

        $data = [
			'title' => 'Edit Module',
			'heading' => 'Edit Module',
            'module'=>(!empty($module)) ? $module : NULL,
            'sections' => $sections
		];
        return view('rolepermission/edit_modules_modal',$data);	
    }

    public function update_module(Request $request){

        if (Auth::check()==FALSE) {
            return redirect('/');
        }
        
        $post = $request->post();
        if(!empty($request->post())){
            $data['module_name'] = $post['module_name'];
            $data['section_name'] = $post['section_name'];
            $data['update_at'] = date('Y-m-d H:i:s');

            if(!empty($post['edit_id'])){
                DB::table('modules')->where('id', $post['edit_id'])->update($data);
                echo 'success';
                exit();
            }
            
        }
    }

    public function delete_module($id){
        //pr($id);die;
        if(!empty($id)){
            DB::table('modules')->where('id', $id)->delete();
            Session::flash('message', 'Created successfully'); 
            Session::flash('alert-class', 'alert-success');
            exit();

        }
    }


    public function roles(Request $request){
         
        if (Auth::check()==FALSE) {
            return redirect('/');
        }
        
        $user_roles = DB::table('role_has_permissions')->orderBy('id', 'asc')->paginate(10);
		$data = [
			'title' => 'Manage Roles',
			'heading' => 'Manage Roles',
            'roles' => $user_roles,
            'append_js' => $this->append_js
		];

        return view('template/template_dashboard',$data);	
    }

    
    public function set_privileges(Request $request,$id=NULL){
         
        if (Auth::check()==FALSE) {
            return redirect('/');
        }

        $modules = DB::table('modules')->orderBy('id', 'asc')->get()->map(function ($item, $key) {
            return (array) $item;
        })->all(); 
        $ModuleGroup = group_by("controller_name", $modules);
        $m_arr = [];
        if(!empty($id)){
            //$saved_modules = DB::table('role_has_permission')->where('role_id',$id)->get();  
            $role_permissions = DB::table('role_has_permissions')->where('id',$id)->first();

            /* foreach($saved_modules as $sm){
                $m_arr[]= $sm->module_id;
            } */    

            $data = [
                'title' => 'Set Privileges',
                'heading' => 'Set Privileges',
                'modules' => (!empty($ModuleGroup)) ? $ModuleGroup : NULL,
                //'saved_module_id' => (!empty($m_arr)) ? $m_arr : NULL,
                'role_permissions' => $role_permissions,
                'append_js' => $this->append_js
            ];
    
            return view('template/template_dashboard',$data);
        }    
			
    }

    function get_controller(Request $request){
        
        if(!empty($request->post())){
            $post = $request->post();
            
            $class_name =  class_basename($post['actionName']);
            $class_str = explode("@",$class_name);
            echo substr($class_str[0], 0, -10);
            exit();
        }

    }

    
    public function add_role(Request $request,$id=NULL){
         
        if (Auth::check()==FALSE) {
            return redirect('/');
        }

        $modules = DB::table('modules')->orderBy('id', 'asc')->get()->map(function ($item, $key) {
            return (array) $item;
        })->all(); 
        $ModuleGroup = group_by("controller_name", $modules);
        
        $user_roles = DB::table('role_has_permissions')->orderBy('id', 'asc')->get();
		$data = [
			'title' => 'Create New Role',
			'heading' => 'Create New Role',
            'modules' => (!empty($ModuleGroup)) ? $ModuleGroup : NULL,
            'user_roles' => $user_roles,
            'append_js' => $this->append_js
		];

        return view('template/template_dashboard',$data);	
    }

    public function store_role(Request $request){

        if (Auth::check()==FALSE) {
            return redirect('/');
        }

        if(!empty($request->post())){

            $post = $request->post();

            $role_name = $post['role_name'];
            $method_name = $post['method_name'];
            $privileges = implode(",",$post['method_name']);
            DB::table('role_has_permissions')->insert(['name'=>$role_name,'privileges'=>$privileges]);

            /* $id = DB::getPdo()->lastInsertId();
            if(count($method_name) > 0) {

                for($i=1;$i<count($method_name);$i++){
                    $data['role_id'] = $id;
                    $data['module_id'] = $method_name[$i];
                    DB::table('role_has_permission')->insert($data);
                }
            } */

            Session::flash('message', 'Created successfully'); 
            Session::flash('alert-class', 'alert-success');
            return redirect('rolepermission/roles');
            exit();
            
  
        }

    }

    public function update_role_privilege(Request $request){

        if (Auth::check()==FALSE) {
            return redirect('/');
        }

        if(!empty($request->post())){

            $post = $request->post();

            $privileges = implode(",",$post['method_name']);
            if(!empty($post['role_id'])){
                DB::table('role_has_permissions')->where('id', $post['role_id'])->update(['privileges'=>$privileges]);
            }
            //$id = DB::getPdo()->lastInsertId();
            
            Session::flash('message', 'Updated successfully'); 
            Session::flash('alert-class', 'alert-success');
            return redirect('rolepermission/roles');
            exit();
            
  
        }

    }


    public function system_users(Request $request){
         
        if (Auth::check()==FALSE) {
            return redirect('/');
        }
        
        $system_users = DB::table('system_users')
        ->join('role_has_permissions', 'system_users.role_id', '=', 'role_has_permissions.id')
        ->select('system_users.*', 'role_has_permissions.name AS role')
        ->orderBy('id', 'asc')->paginate(10);
		$data = [
			'title' => 'Manage User and Roles',
			'heading' => 'Manage User and Roles',
            'system_users' => $system_users,
            'append_js' => $this->append_js
		];

        return view('template/template_dashboard',$data);	
    }


    public function add_system_user(Request $request){
        
        if (Auth::check()==FALSE) {
            return redirect('/');
        }

        $roles = DB::table('role_has_permissions')->select(['id','name'])->orderBy('id', 'asc')->get();
      
        $data = [
			'title' => 'Add New User',
			'heading' => 'Add New User',
            'roles' => $roles
		];
        return view('rolepermission/add_system_user_modal',$data);	
    }



    public function store_system_user(Request $request){

        if (Auth::check()==FALSE) {
            return redirect('/');
        }

        if(!empty($request->post())){

            $post = $request->post();

            $data['name'] = $post['name'];
            $data['username'] = $post['user_name'];
            $data['email'] = $post['user_email'];
            $data['mobile'] = $post['user_mobile'];
            $data['role_id'] = $post['user_role'];

            DB::table('system_users')->insert($data);
            echo 'success';
            exit();
            /* Session::flash('message', 'Created successfully'); 
            Session::flash('alert-class', 'alert-success');
            return redirect('rolepermission/system_users');
            exit(); */
            
  
        }

    }

}
