<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {


    var $table  = 'admin';
    var $column_order = array('nm_admin','username',null);
    var $column_search = array('nm_admin','username'); 
    var $order = array('create_on' => 'ASC');  
    

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 

    //========================MODEL FUNCTION CRUD ADMIN========================\\
       
     private function query(){

            $this->db->from($this->table);
            $i = 0;
    
            foreach ($this->column_search as $item){
                if($_POST['search']['value']){   
                    $this->db->like("LOWER(nm_admin)", strtolower($_POST["search"]["value"])); 
                }
            $i++;
            }
            if(isset($_POST['order'])){
                $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }else if(isset($this->order)){
                $order = $this->order;
                $this->db->order_by(key($order), $order[key($order)]);
            }
    }
        

    function get_datatables_admin(){

        $this->query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_admin(){

        $this->query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all_admin(){

        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function admin_get_by_id($id){

        $this->db->from($this->table);
        $this->db->where('id_admin',$id);
        $query = $this->db->get();
        return $query->row();
    }

    function save_admin($data){

       $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function update_admin($where, $data){

        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
        
    function delete_admin($id){
        $this->db->where('id_admin', $id);
        $this->db->delete($this->table);
    }
             
}