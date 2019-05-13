<?php
class M_dashboard extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function count_admin(){
         $query = $this->db->get('admin');
         return $query->num_rows();
    }

    function count_barang(){
        $query = $this->db->get('barang');
         return $query->num_rows();
    }
}