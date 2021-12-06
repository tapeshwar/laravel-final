<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class WebsiteController extends Controller
{

    private $assets = []; 

    public function __construct() {
        //$this->append_js = ['test.js','test2.js'];
        //$this->append_css = ['test.css','test2.css'];
        DB::enableQueryLog();
    }
    
    public function manage_menu(){

        DB::enableQueryLog();
		
        if (Auth::check()==FALSE) {
            return redirect('/');
        }

        //$menu = setLink2('');
        //$mset = $this->website_model->get_mset($project_key);
        $project_key = session('project_key');
        $mset = DB::table('menu_set')->where('project_key', $project_key)->orderBy('id', 'desc')->get()->map(function ($item, $key) {
            return (array) $item;
        })->all();
        
        //$menu_set_list = $this->website_model->get_menu_set($project_key);
        $menu_set_list = DB::table('menu_set')->where('project_key', $project_key)->orderBy('id', 'desc')->get()->map(function ($item, $key) {
            return (array) $item;
        })->all();
        
        if(!empty($mset)){  
         
            $menu = [];
            $sub_menu = '';
            foreach ($mset as $v) {

                $result2 = DB::select( DB::raw("SELECT * FROM menu WHERE menu_set = :menu_set AND parent = :parent ORDER BY s_no"), array(
                    'menu_set' => $v['id'],'parent'=>""
                  ));
                   
                $sub_menu = null; 
                foreach ($result2 as $v2) { 
                    $result3 = DB::select( DB::raw("SELECT * FROM menu WHERE menu_set = :menu_set AND parent = :parent ORDER BY s_no"), array(
                        'menu_set' => $v2->menu_set,'parent'=>$v2->id
                      ));

                    $sub_menu2 = [];
                    foreach ($result3 as $v3) {

                        $result4 = DB::select( DB::raw("SELECT * FROM menu WHERE menu_set = :menu_set AND parent = :parent ORDER BY s_no"), array(
                            'menu_set' => $v3->menu_set,'parent'=>$v3->id
                          ));

                        $sub_menu3 = [];

                        foreach ($result4 as $v4) {

                            $result5 = DB::select( DB::raw("SELECT * FROM menu WHERE menu_set = :menu_set AND parent = :parent ORDER BY s_no"), array(
                                'menu_set' => $v4->menu_set,'parent'=>$v4->id
                              ));
                            $sub_menu4 = [];
                            foreach ($result5 as $v5) {

                                $result6 = DB::select( DB::raw("SELECT * FROM menu WHERE menu_set = :menu_set AND parent = :parent ORDER BY s_no"), array(
                                    'menu_set' => $v5->menu_set,'parent'=>$v5->id
                                  ));
                                $sub_menu5 = [];
                                foreach ($result6 as $v6) {
                                    
                                    $sub_menu5[] = array('id'=>$v6->id,'name'=>$v6->heading,'title'=>$v6->title,'parent'=>$v6->parent,'custom_link'=>$v6->custom_link,'enable'=>$v6->enable,'sub_menu'=>'');
                                }
                                
                                $sub_menu4[] = array('id'=>$v5->id,'name'=>$v5->heading,'title'=>$v5->title,'parent'=>$v5->parent,'custom_link'=>$v5->custom_link,'enable'=>$v5->enable,'sub_menu'=>$sub_menu5);
                            }

                            
                            $sub_menu3[] = array('id'=>$v4->id,'name'=>$v4->heading,'title'=>$v4->title,'parent'=>$v4->parent,'custom_link'=>$v4->custom_link,'enable'=>$v4->enable,'sub_menu'=>$sub_menu4);
                        }

                    $sub_menu2[] = array('id'=>$v3->id,'name'=>$v3->heading,'title'=>$v3->title,'parent'=>$v3->parent,'custom_link'=>$v3->custom_link,'enable'=>$v3->enable,'sub_menu'=>$sub_menu3);
                } 

                $sub_menu[] = array('id'=>$v2->id,'name'=>$v2->heading,'title'=>$v2->title,'parent'=>$v2->parent,'custom_link'=>$v2->custom_link,'enable'=>$v2->enable,'sub_menu'=>$sub_menu2);

                }    

             $menu[] = array('id'=>$v['id'],'name'=>$v['name'],'set_sub_menu'=>$sub_menu);               
            }
     
        }
	
		$data = [
			'title' => 'Manage Menus',
			'heading' => 'Manage Menus',
            'menu2' => (!empty($menu)) ? $menu : NULL,
            'menu_set_list' => $menu_set_list
		];
		
		//$this->load->view('template/template_dashboard',array_merge($data,$this->assets));
        return view('template/template_dashboard',$data);
    }


    public function update_menu_order(Request $request){
        if(!empty($request->post())){
            $data = $request->post();

            $list = $data['data'];
            if ($list !='') {
                $sno = 0;
                foreach ($list as $key => $value) { 
                    $item_id = (!empty($value['item_id'])) ? $value['item_id'] : "";
                    $v_id = (!empty($value['id'])) ? $value['id'] : '';
                    $pid = (!empty($value['parent_id'])) ? $value['parent_id'] : "";

                    DB::table('menu')->where('id', $v_id)->update(['parent' => $pid, 's_no' => $sno]);

                    $sno++;
                }            
            }
 
            echo '<span class="success" style="color:green">Menu Order updated.</span>'; 
            exit();

        }
        
    }

    public function edit_menu(Request $request, $id){
        if(!empty($request->post())){
            $post = $request->post();
            $data['title'] = $post['title'];
            $data['heading'] = $post['name'];
            $data['custom_link'] = (!empty($post['custom_link'])) ? $post['custom_link'] : "";
            $data['enable'] = (!empty($post['is_enable'])) ? $post['is_enable'] : 1;

            DB::table('menu')->where('id', $id)->update($data);
            echo 'Updated.'; 
            exit();

        }
    }

    public function delete_menu($id){
        //pr($id);die;
        if(!empty($id)){
            DB::table('menu')->where('id', $id)->delete();
            //$ret = $this->website_model->delete_menu_row($id); 
            //$this->session->set_flashdata('success', 'Deleted successfully!!');
            exit();

        }
    }

    public function delete_menu_set($id){
        //pr($id);die;
        if(!empty($id)){
            DB::table('menu_set')->where('id', $id)->delete();
            //$ret = $this->website_model->delete_menu_set_row($id); 
            //$this->session->set_flashdata('success', 'Deleted successfully!!');
            exit();

        }
    }

    public function create_menu_set(Request $request){
        if(!empty($request->post())){
            $post = $request->post();
            $data['uid'] = (!empty(session('id'))) ? session('id') : 0;
            $data['project_key'] = (!empty(session('project_key'))) ? session('project_key') : '1161270535';

            $string = $post['menu_set_name'];
            $s = ucfirst($string);
            $bar = ucwords(strtolower($s));
            $name = preg_replace('/\s+/', '', $bar);
            $data['name'] = $name;

            $data['enable'] = 'Yes';
            DB::table('menu_set')->insert($data);
            Session::flash('message', 'Created successfully');
            //$ret = $this->website_model->create_menu_set($data); 
            //$this->session->set_flashdata('success', 'Created successfully!!');
            exit();

        }
    }

    public function add_menu(Request $request){
        if(!empty($request->post())){
            $post = $request->post();
            $data['uid'] = (!empty(session('id'))) ? session('id') : 0;
            $data['project_key'] = (!empty(session('project_key'))) ? session('project_key') : '1161270535';
            $data['parent'] = (!empty($post['parent'])) ? $post['parent'] : "";
            $data['menu_set'] = $post['menu_set_id'];
            $data['title'] = $post['menu_title'];
            $data['heading'] = $post['menu_heading'];
            $data['custom_link'] = (!empty($post['custom_link'])) ? $post['custom_link'] : "";
            $data['open_in'] = 'SELF';
            $data['s_no'] = (!empty($post['s_no'])) ? $post['s_no'] : 0;
            $data['enable'] = 'Y';

            //$ret = $this->website_model->add_menu_to_menuset($data);
            DB::table('menu')->insert($data);
            //$this->session->set_flashdata('success', 'Added successfully!!');
            exit();
        }
    }

    public function create_page(){

        $data = [
			'title' => 'Create Page',
			'heading' => 'Create Page',
		];
		
        return view('template/template_dashboard',$data);	
    }


    public function store_page(Request $request){

        if(!empty($request->post())){

            $post = $request->post();

            $data['uid'] = (!empty(session('id'))) ? session('id') : 0;
            $data['project_key'] = (!empty(session('project_key'))) ? session('project_key') : '1161270535';

            $data['title'] = $post['title'];
            $data['heading'] = $post['heading'];
            $data['sub_heading'] = (!empty($post['sub_heading'])) ? $post['sub_heading'] : "";

            $data['keywords'] = (!empty($post['keywords'])) ? $post['keywords'] : "";
            $data['description'] = (!empty($post['description'])) ? $post['description'] : "";
            $data['content'] = $post['content'];
            $data['home'] = (!empty($post['home'])) ? $post['home'] : 'No';

            $data['s_no'] = "";
            $data['enable'] = $post['enable'];
            DB::table('page')->insert($data);

            Session::flash('message', 'Created successfully'); 
            Session::flash('alert-class', 'alert-success');
            //print_r(Session::get('message'));
            //$this->session->set_flashdata('success', 'Added successfully!!');
            return redirect('website/pages');
            exit();
        }

    }

    
    public function edit_page(Request $request,$eid=NULL){

        if(!empty($eid)){
            $update_data = DB::table('page')->where('id', $eid)->first();
            
        }

        $data = [
			'title' => 'Edit Page',
			'heading' => 'Eidt Page',
            'update_data'=>(!empty($update_data)) ? $update_data : NULL,
		];
        return view('template/template_dashboard',$data);	
		//$this->load->view('template/template_dashboard',array_merge($data,$this->assets));
    }


    public function update_page(Request $request){

        if(!empty($request->post())){

            $post = $request->post();

            $data['uid'] = (!empty(session('id'))) ? session('id') : 0;
            $data['project_key'] = (!empty(session('project_key'))) ? session('project_key') : '1161270535';

            $data['title'] = $post['title'];
            $data['heading'] = $post['heading'];
            $data['sub_heading'] = (!empty($post['sub_heading'])) ? $post['sub_heading'] : "";

            $data['keywords'] = (!empty($post['keywords'])) ? $post['keywords'] : "";
            $data['description'] = (!empty($post['description'])) ? $post['description'] : "";
            $data['content'] = $post['content'];
            $data['home'] = (!empty($post['home'])) ? $post['home'] : 'No';

            $data['s_no'] = "";
            $data['enable'] = $post['enable'];

            if(!empty($post['eid'])){
                DB::table('page')->where('id', $post['eid'])->update($data);
            }
            Session::flash('message', 'Updated successfully'); 
            Session::flash('alert-class', 'alert-success');
            //$this->session->set_flashdata('success', 'Added successfully!!');
            return redirect('website/pages');
            exit();
        }

    }

    public function pages(Request $request){
        
        $project_key = session('project_key');
        if (Auth::check()==FALSE) {
            return redirect('/');
        }
        $where = [];
        if(!empty($request->get('q'))){
            $heading = $request->get('q');
            $where['heading'] = $heading;
            //$where['title'] = $heading;
        }
        $where['project_key'] = $project_key;
        $pages = DB::table('page')->where($where)->orderBy('id', 'desc')->paginate(10);
        //dd(DB::getQueryLog());
        //die;

		$data = [
			'title' => 'Page List',
			'heading' => 'Page List',
			'pages' => $pages
		];

        return view('template/template_dashboard',$data);	
		//$this->load->view('template/template_dashboard',array_merge($data,$this->assets));
    }
}
