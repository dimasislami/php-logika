<?php
class M_auth extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    function m_setting(){
        $lihat = $this->db->get('setting');
        return  $lihat->result();
    }

    function cek($data) {
		$query = $this->db->get_where('admin', $data);
		return $query;
	}
}