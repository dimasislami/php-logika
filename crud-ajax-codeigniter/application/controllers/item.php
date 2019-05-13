<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {
    
    public function __construct() {
		parent::__construct();
		$this->load->model('m_item');
        $this->zend->load('Zend/Barcode');
		$this->title = 'Sistem Informasi Inventory';
        $this->desc  = 'Inventory';
         if($_SESSION['status_jabatan'] != "Admin"){
                redirect('error');
            } 
	}
    
	function index(){  
              
            $data=array(
            'title'          => $this->title,
            'desc'           => $this->desc,
            'breadcrumb'     => 'View',
            'url_breadcrumb' => base_url('item'),
            'content'        => 'item/index'
            );
          
        $this->load->view('layout/wrapper', $data);
            }
        
    function list_item()
	{
            $list = $this->m_item->get_datatables_item();
            $data = array();
            $no   = $_POST['start'];
            foreach ($list as $item) {
                    $no++;
                    $row   = array();
                    $row[] = '<center>'.$no.'</center>';
                    $row[] = ucwords($item->nm_barang);
                    $row[] = '<center>'.$item->jumlah.'</center>';
                    $row[] = '<center>'.$item->satuan.'</center>';
                    $row[] = '<center style="width:200px">
                               <a class="btn btn-xs btn-primary" href="' . base_url() . 'assets/barcode-item/' . $item->id_barang . '.png" target="_blank"
                             title="Barcode")">
                                <i class="fa fa-barcode"></i> Barcode
                                </a>
                    			<a class="btn btn-xs btn-success" href="javascript:void(0)"  title="Edit" onclick="edit_item('."'".$item->id_barang."'".')">
                    			<i class="fa fa-edit"></i> Edit
                    			</a>
                              	<a class="btn btn-xs btn-danger" href="javascript:void(0)"  title="Delete" onclick="delete_item('."'".$item->id_barang."'".')">
                              	<i class="fa fa-trash"></i> Hapus
                              	</a>
                              </center>';

                    $data[] = $row;
		}
		$output = array(
                    "draw"            => $_POST['draw'],
                    "recordsTotal"    => $this->m_item->count_all_item(),
                    "recordsFiltered" => $this->m_item->count_filtered_item(),
                    "data"            => $data,
                    	);
		//output to json format
		echo json_encode($output);
	}
    
    function detail_item($id){

		$data = $this->m_item->item_get_by_id($id);
		echo json_encode($data);
	}

    function add_item(){

		$data = array(
			'nm_barang'   	=> $this->input->post('nm_barang'),
			'jumlah'		=> $this->input->post('jumlah'),
            'satuan'        => $this->input->post('satuan')
			);       
		$this->m_item->save_item($data);
		echo json_encode(array("status" => TRUE));
	}

    function combo_barang(){
        $data = array(
            'combo' => $this->m_item->combo_barang(),
        );
        $this->load->view("usage/combo-barang", $data);
    }  

    function update_item(){

        $data = array(
            'id_barang'     => strtoupper($this->input->post('id_barang')),
            'nm_barang'     => $this->input->post('nm_barang'),
            'jumlah'        => $this->input->post('jumlah'),
            'satuan'        => $this->input->post('satuan')
            );
            


		
		$this->m_item->update_item(array('id_barang' => $this->input->post('id_barang')), $data);
		echo json_encode(array("status" => TRUE));
	}
    
    function delete_item($id){

    	
		$this->m_item->delete_item($id);
		echo json_encode(array("status" => TRUE));
	}


    public function barcode($kode)
    {       $data = array(
            'data'           => $kode,
            'title'          => $this->title,
            'desc'           => $this->desc,
            'breadcrumb'     => 'View',
            'url_breadcrumb' => base_url('item'),
            'content'        => 'item/barcode'
            );
            $this->load->view('layout/wrapper',$data);
    }

}


