<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {
    
    public function __construct() {
		parent::__construct();
		$this->load->model('m_upload');
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $this->load->helper(array('form','url'));
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
            'content'        => 'item/upload'
            );
          
        $this->load->view('layout/wrapper', $data);
            }
        
    function list_item()
	{
            $list = $this->m_upload->get_datatables_item();
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
                    "recordsTotal"    => $this->m_upload->count_all_item(),
                    "recordsFiltered" => $this->m_upload->count_filtered_item(),
                    "data"            => $data,
                    	);
		//output to json format
		echo json_encode($output);
	}
    
    function detail_item($id){

		$data = $this->m_upload->item_get_by_id($id);
		echo json_encode($data);
	}

    function add_item(){

		$data = array(
			'nm_barang'   	=> $this->input->post('nm_barang'),
			'jumlah'		=> $this->input->post('jumlah'),
            'satuan'        => $this->input->post('satuan')
			);
		
       
		$this->m_upload->save_item($data);
		echo json_encode(array("status" => TRUE));
        // Save barcode to folder
        $query = $this->db->query('SELECT  MAX(id_barang) AS last_id FROM barang');
        foreach($query->result() as $row){
            $last_id = $row->last_id;
        }
        $kode = $last_id;
        $file= Zend_Barcode::draw('code128', 'image', array('text'=>$kode, 'drawText' => false), array());
        $store_image = imagepng($file,"./assets/barcode-item/$kode.png");
        return $kode.'.png';
	}

    function combo_barang(){
        $data = array(
            'combo' => $this->m_upload->combo_barang(),
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
            


		
		$this->m_upload->update_item(array('id_barang' => $this->input->post('id_barang')), $data);
		echo json_encode(array("status" => TRUE));
	}
    
    function delete_item($id){

    	
		$this->m_upload->delete_item($id);
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

    function upload_excel(){
        $fileName = date('Y-m-d_H-i-s').'_'.$_FILES["file_upload"]['name'];
         
        $config['upload_path']      = './assets/excel/'; //buat folder dengan nama assets di root folder
        $config['file_name']        = $fileName;
        $config['allowed_types']    = 'xls|xlsx|csv';
        $config['max_size']         = 10000;
         
        $this->load->library('upload');
        $this->upload->initialize($config);
         
        if(! $this->upload->do_upload('file_upload') )
        $this->upload->display_errors();
             
        $media = $this->upload->data('file_upload');
        $inputFileName = './assets/excel/'.$fileName;
         
        try {
                $inputFileType  = IOFactory::identify($inputFileName);
                $objReader      = IOFactory::createReader($inputFileType);
                $objPHPExcel    = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }

            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
            for ($row = 2; $row <= $highestRow; $row++) { // Read a row of data into an array                 
                 $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);
                
                $data = array(     // Sesuaikan sama nama kolom tabel di database
                    "nm_barang" => $rowData[0][0],
                    "jumlah" => $rowData[0][1],
                    "satuan" => $rowData[0][2]
                );
                
                $this->db->insert("barang", $data); 
                echo json_encode(array("status" => TRUE)); 
            }
        }
    
}


