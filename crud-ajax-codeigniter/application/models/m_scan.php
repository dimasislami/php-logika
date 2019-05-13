<?php
class M_scan extends CI_Model{
	
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function cari($search){
  		$this->db->select("*");
  		$id = array('id_barang' =>$search);
  		$this->db->where($id);
  		$this->db->from('barang');
  		$query = $this->db->get();
 		return $query->result();
 }

}