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
        $this->assets['js'] = ['website.js'];
    }
    
    public function manage_menu(){

        DB::enableQueryLog();
		
        if (Auth::check()==FALSE) {
            return redirect('/');
        }

        //$menu = setLink2('');
        //$mset = $this->website_model->get_mset($project_key);
        $project_key = session('project_key');
        $mset = DB::table('menu_set')->where('project_key', $project_key)->get()->map(function ($item, $key) {
            return (array) $item;
        })->all();
        
        //$menu_set_list = $this->website_model->get_menu_set($project_key);
        $menu_set_list = DB::table('menu_set')->where('project_key', $project_key)->get()->map(function ($item, $key) {
            return (array) $item;
        })->all();
        
        if(!empty($mset)){  
            
            
         
            $menu = [];
            $sub_menu = '';
            foreach ($mset as $v) {

                $result2 = DB::select( DB::raw("SELECT * FROM menu WHERE menu_set = :menu_set AND parent = :parent"), array(
                    'menu_set' => $v['id'],'parent'=>""
                  ));
                    //echo '<pre>';
                    //print_r($result2);
                    //die;
                
                /* $result2 = DB::table('menu')->where('menu_set', $v['id'])->get()->map(function ($item, $key) {
                    return (array) $item;
                })->all(); */

                
                $sub_menu = null; 
                foreach ($result2 as $v2) { 

                    $result3 = DB::select( DB::raw("SELECT * FROM menu WHERE menu_set = :menu_set AND parent = :parent"), array(
                        'menu_set' => $v2->menu_set,'parent'=>$v2->id
                      ));

                    //echo '<pre>';
                    //print_r($result3);
                    
                    /* $result3 = DB::table('menu')->where([
                            ['menu_set','=', $v2['menu_set'] ],
                            ['parent','=', $v2['id'] ],
                        ])->get()->map(function ($item, $key) {
                        return (array) $item;
                    })->all(); */

                    $sub_menu2 = [];
                    foreach ($result3 as $v3) {

                        $result3 = DB::select( DB::raw("SELECT * FROM menu WHERE menu_set = :menu_set AND parent = :parent"), array(
                            'menu_set' => $v3->menu_set,'parent'=>$v3->id
                          ));

                        /* $result4 = DB::table('menu')->where([
                            ['menu_set','=', $v3['menu_set'] ],
                            ['parent','=', $v3['id'] ],
                        ])->get()->map(function ($item, $key) {
                            return (array) $item;
                        })->all(); */
                        $sub_menu3 = [];
                    

                    $sub_menu2[] = array('id'=>$v3->id,'name'=>$v3->heading,'title'=>$v3->title,'parent'=>$v3->parent,'custom_link'=>$v3->custom_link,'enable'=>$v3->enable,'sub_menu'=>$sub_menu3);
                } 

                $sub_menu[] = array('id'=>$v2->id,'name'=>$v2->heading,'title'=>$v2->title,'parent'=>$v2->parent,'custom_link'=>$v2->custom_link,'enable'=>$v2->enable,'sub_menu'=>$sub_menu3);

                }    

             $menu[] = array('id'=>$v['id'],'name'=>$v['name'],'set_sub_menu'=>$sub_menu);               
            }
            echo '<pre>';
            print_r($menu);
            die;
           
     
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
                    $item_id = (!empty($value['item_id'])) ? $value['item_id'] : '';
                    $v_id = (!empty($value['id'])) ? $value['id'] : '';
                    $pid = (!empty($value['parent_id'])) ? $value['parent_id'] : '';

                    DB::table('menu')
                            ->where('id', $v_id)
                            ->update(['parent' => $pid, 's_no' => $sno]);

                    /* $this->db->query("UPDATE menu SET 
                    parent   = '" . $value['parent_id'] . "',
                    s_no     = '" . $sno . "' 
                    WHERE id = '" . $v_id . "' "); */

                    $sno++;
                }            
            }

            //$ret = $this->website_model->update_menu_order($id,$data); 
            echo '<span class="success" style="color:green">Menu Order updated.</span>'; 
            exit();

        }
        
    }

    public function edit_menu($id){
        if(!empty($this->input->post())){
            $data = $this->input->post();
            $ret = $this->website_model->update_menu_name($id,$data); 
            echo 'Updated.'; 
            exit();

        }
    }

    public function delete_menu($id){
        //pr($id);die;
        if(!empty($id)){
            $ret = $this->website_model->delete_menu_row($id); 
            $this->session->set_flashdata('success', 'Deleted successfully!!');
            exit();

        }
    }

    public function delete_menu_set($id){
        //pr($id);die;
        if(!empty($id)){
            $ret = $this->website_model->delete_menu_set_row($id); 
            $this->session->set_flashdata('success', 'Deleted successfully!!');
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

        if(!empty($this->input->post())){
            $post = $this->input->post();
            $data['uid'] = $this->session->userdata('id');
            $data['project_key'] = (!empty($this->session->userdata('project_key'))) ? $this->session->userdata('project_key') : '1161270535';

            $data['title'] = $post['title'];
            $data['heading'] = $post['heading'];
            $data['sub_heading'] = (!empty($post['sub_heading'])) ? $post['sub_heading'] : '';

            $data['keywords'] = (!empty($post['keywords'])) ? $post['keywords'] : '';
            $data['description'] = (!empty($post['description'])) ? $post['description'] : '';
            $data['content'] = $post['content'];
            $data['home'] = (!empty($post['home'])) ? $post['home'] : 'No';

            $data['s_no'] = '';
            $data['enable'] = $post['enable'];

            $ret = $this->website_model->add_page($data);
            $this->session->set_flashdata('success', 'Added successfully!!');
            exit();
        }

        $data = [
			'title' => 'New Page',
			'heading' => 'New Page',
		];
		
		$this->load->view('template/template_dashboard',array_merge($data,$this->assets));
    }

    public function pages(){
        if(empty($this->session->userdata('id'))){
			return redirect(base_url());
		}

		$get = $this->input->get();
		if(!empty($get['name'])){
			$get['name'] = $get['name'];
		}
		
		$total_row = $this->website_model->get_data2($get,'count');

		$config['base_url'] = base_url('website/pages');
		$config['total_rows'] = $total_row;
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
		$config['reuse_query_string'] = TRUE;
		//$config['use_page_numbers'] = TRUE;

        /* <ul class="pagination">
            <li class="page-item disabled"><span class="page-link">Previous</span></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active"><span class="page-link">2<span class="sr-only">(current)</span></span></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul> */

		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = "<li class='page-item'><span class='page-link'>";
		$config['num_tag_close'] = "</span></li>";
		$config['cur_tag_open'] = "<li class='page-item active'><span class='page-link'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></span></li>";
		$config['next_tag_open'] = "<li class='page-item'><span class='page-link'>";
		$config['next_tag_close'] = "</span></li>";
		$config['prev_tag_open'] = "<li class='page-item'><span class='page-link'>";
		$config['prev_tag_close'] = "</span></li>";
		$config['first_tag_open'] = "<li class='page-item'><span class='page-link'>";
		$config['first_tag_close'] = "</span></li>";
		$config['last_tag_open'] = "<li class='page-item'><span class='page-link'>";
		$config['last_tag_close'] = "</span></li>";



		$this->pagination->initialize($config); 

		$get['offset'] = $this->uri->segment(3);
		$get['limit'] = $config['per_page'];
		
		$data = $this->website_model->get_data2($get,$count=NULL);
		//pr($data);die;

		$data = [
			'title' => 'Page List',
			'heading' => 'Page List',
			'page_data' => $data['data'],
			'pages' => $get['offset']
		];
		
		$this->load->view('template/template_dashboard',array_merge($data,$this->assets));
    }
}
