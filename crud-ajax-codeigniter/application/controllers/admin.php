<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct() {
		parent::__construct();
		$this->load->model('m_admin');
		$this->title = 'Sistem Informasi Pegawai';
        $this->desc  = 'Administrator';
         if($_SESSION['status_jabatan'] != "Admin"){
                redirect('error');
            } 
	}
    
	function index(){  
              
            $data=array(
            'title'          => $this->title,
            'desc'           => $this->desc,
            'breadcrumb'     => 'View',
            'url_breadcrumb' => base_url('admin'),
            'content'        => 'admin/index'
            );
          
        $this->load->view('layout/wrapper', $data);
            }
        
    function list_admin()
	{
            $list = $this->m_admin->get_datatables_admin();
            $data = array();
            $no   = $_POST['start'];
            foreach ($list as $admin) {
                    $no++;
                    $row   = array();
                    $row[] = '<center>'.$no.'</center>';
                    $row[] = $admin->nm_admin;
                    $row[] = $admin->username;
                    $row[] = $admin->kelamin;
                    $row[] = $admin->status_jabatan;	
                    $row[] = '<center>'.$admin->create_on.'</center>';
                    $row[] = '<center>'.$admin->update_on.'</center>';
                    $row[] = '<center>
                    			<a class="btn btn-xs btn-success" href="javascript:void(0)" onclick="edit_admin('."'".$admin->id_admin."'".')">
                    			<i class="fa fa-edit"></i> Edit
                    			</a>
                              	<a class="btn btn-xs btn-danger"  href="javascript:void(0)" onclick="delete_admin('."'".$admin->id_admin."'".')">
                              	<i class="fa fa-trash"></i> Hapus
                              	</a>
                              </center>';
						
		}
		$output = array(
                    "draw"            => $_POST['draw'],
                    "recordsTotal"    => $this->m_admin->count_all_admin(),
                    "recordsFiltered" => $this->m_admin->count_filtered_admin(),
                    "data"            => $data,
                    	);
		//output to json format
		echo json_encode($output);
	}
    
    function detail_admin($id){

		$data = $this->m_admin->admin_get_by_id($id);
		echo json_encode($data);
	}

    function add_admin(){

    	date_default_timezone_set("Asia/Jakarta");
		$data = array(
			'nm_admin'   	=> ucwords($this->input->post('nm_admin')),
			'username'   	=> $this->input->post('username'),
			'password'   	=> md5($this->input->post('password')),
			'kelamin'   	=> $this->input->post('kelamin'),
			'status_jabatan'=> "Admin",
			'create_on'   	=> date("d-m-Y H:i:s"),
			'update_on'   	=> "-",
			);
		$this->m_admin->save_admin($data);
		echo json_encode(array("status" => TRUE));
	}

    function update_admin(){
		date_default_timezone_set("Asia/Jakarta");
		$id_admin = $this->input->post('id_admin');
	        if($this->input->post('password')!=""){
	            $data=array(
	            'nm_admin'   	=> $this->input->post('nm_admin'),
				'username'   	=> $this->input->post('username'),
				'password'   	=> md5($this->input->post('password')),
				'kelamin'   	=> $this->input->post('kelamin'),
				'status_jabatan'=> "Admin",
	            'create_on'     => $this->input->post('create_on'),
	            'update_on'     => date('Y-m-j H:i:s')
	            );
	        }
	        if($this->input->post('password')==""){
	            $data=array(
	            'nm_admin'   	=> $this->input->post('nm_admin'),
				'username'   	=> $this->input->post('username'),
				'kelamin'   	=> $this->input->post('kelamin'),
				'status_jabatan'=> "Admin",
	            'create_on'     => $this->input->post('create_on'),
	            'update_on'     => date('Y-m-j H:i:s')
	            );
	        }
		$this->m_admin->update_admin(array('id_admin' => $this->input->post('id_admin')), $data);
		echo json_encode(array("status" => TRUE));
	}
    
    function delete_admin($id){

		$this->m_admin->delete_admin($id);
		echo json_encode(array("status" => TRUE));
	}

}


