<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_usage extends CI_Model {

    var $table = 'pemakaian';
    var $column_order = array('nama','bagian','keterangan','nm_barang','tgl_pemakaian','jumlah_pemakaian', null);
    var $column_search = array('nama','bagian','keterangan','nm_barang','tgl_pemakaian','jumlah_pemakaian', null); 
    var $order = array('id_pemakaian' => 'ASC');  
    

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
 

    //========================MODEL FUNCTION CRUD employee========================\\
       
     private function query(){
            $this->db->select('barang.*, pemakaian.*');
            $this->db->from('barang');
            $this->db->join('pemakaian', 'pemakaian.id_barang=barang.id_barang');
            $i = 0;
    
            foreach ($this->column_search as $item){
                if($_POST['search']['value']){   
                    $this->db->like("LOWER(nama)", strtolower($_POST["search"]["value"])); 
                    $this->db->or_like("LOWER(nm_barang)", strtolower($_POST["search"]["value"])); 
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
        

    function get_datatables_usage(){

        $this->query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_usage(){

        $this->query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all_usage(){

        $this->db->select('barang.*, pemakaian.*');
        $this->db->from('barang');
        $this->db->join('pemakaian', 'pemakaian.id_barang=barang.id_barang');
        return $this->db->count_all_results();
    }

    function usage_get_by_id($id){

        $this->db->select('barang.*, pemakaian.*');
        $this->db->from('barang');
        $this->db->join('pemakaian', 'pemakaian.id_barang=barang.id_barang');
        $this->db->where('pemakaian.id_pemakaian',$id);

        $query = $this->db->get();
        return $query->row();
    }

    function save_usage($data){

       $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function update_usage($where, $data){

        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
        
    function delete_usage($id){
        $this->db->where('id_pemakaian', $id);
        $this->db->delete($this->table);
    }

    function list_barang(){
        $this->db->from('barang');
        return $this->db->get()->result();
    }

    function list_barang_pakai($id){
        $this->db->select('barang.*, pemakaian.*');
        $this->db->from('barang');
        $this->db->join('pemakaian', 'pemakaian.id_barang=barang.id_barang');
        $this->db->where('id_pemakaian',$id);
        $query = $this->db->get();
        return $query->row();
    }
             
}