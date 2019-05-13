<?php
 if(!defined('BASEPATH')) exit('No direct accessallowed');
 
class Auth extends CI_Controller{
    
    public function __construct() {
		parent::__construct();
	}
    
    public function index(){
        
         $this->load->view('login/login');
	}

	public function do_login (){
		$data = array('username' => $this->input->post('username', TRUE),
					  'password' => md5($this->input->post('password', TRUE))
		);
		$this->load->model('m_auth'); // load model_user
		$hasil = $this->m_auth->cek($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] 	= 'Sudah Loggin';
				$sess_data['id_admin'] 		= $sess->id_admin;
				$sess_data['nm_admin'] 		= $sess->nm_admin;
				$sess_data['username'] 		= $sess->username;
				$sess_data['status_jabatan']= $sess->status_jabatan;
				$sess_data['create_on'] 	= $sess->create_on;
				$sess_data['update_on'] 	= $sess->update_on;
				$this->session->set_userdata($sess_data);
			}

			redirect('dashboard');
		}
		else {
			$this->session->set_flashdata('gagal','
			 	<p class="text-danger">
			 		Your username or password is wrong, Please check again...
			 	</p>

			 	');
		redirect(base_url());
		}
	}

	public function logout() {
		$this->session->unset_userdata('nm_admin');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('status_jabatan');
		redirect(base_url());
		session_destroy();
		
	}

}


