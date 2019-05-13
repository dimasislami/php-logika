<?php if(!defined('BASEPATH')) exit('No direct access allowed');

class Dashboard extends CI_Controller{
    function __construct(){
        parent:: __construct();
            $this->load->model('m_dashboard');
            $this->desc = 'Dashboard';
            $this->url_breadcrumb = '';
            if($_SESSION['status_jabatan'] != "Admin"){
                redirect('error');
            } 
           
    }
    
    public function index(){
        
            $data = array(
                'total_admin'           => $this->m_dashboard->count_admin(),
                'total_barang'        => $this->m_dashboard->count_barang(),
                'desc'                  => $this->desc,
                'submenu'               => '',
                'breadcrumb'            => '',
                'url_breadcrumb'        => $this->url_breadcrumb,
                'content'               => 'index'
            );
            $this->load->view('layout/wrapper', $data);
       
}

}

