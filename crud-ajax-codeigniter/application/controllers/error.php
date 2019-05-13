<?php if(!defined('BASEPATH')) exit('No direct access allowed');
class Error extends CI_Controller
{
   
    function index(){
        $this->load->view('error404');
    }
    

}