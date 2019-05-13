<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_item extends CI_Model {


    var $table  = 'barang';
    var $column_order = array('nm_barang','satuan',null);
    var $column_search = array('nm_barang','satuan'); 
    var $order = array('id_barang' => 'ASC');  
    

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 

    //========================MODEL FUNCTION CRUD employee========================\\
       
     private function query(){

            $this->db->from($this->table);
            $i = 0;
    
            foreach ($this->column_search as $item){
                if($_POST['search']['value']){   
                    $this->db->like("LOWER(nm_barang)", strtolower($_POST["search"]["value"])); 
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
        

    function get_datatables_item(){

        $this->query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_item(){

        $this->query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all_item(){

        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function item_get_by_id($id){

        $this->db->from($this->table);
        $this->db->where('id_barang',$id);
        $query = $this->db->get();
        return $query->row();
    }

    function save_item($data){

       $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function update_item($where, $data){

        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
        
    function delete_item($id){
        $this->db->where('id_barang', $id);
        $this->db->delete($this->table);
    }

    function combo_barang(){
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result();
    }
         
}