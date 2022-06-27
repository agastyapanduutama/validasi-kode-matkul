<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class C_import extends CI_Controller {


    
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->load->library('excel');
        
    }
    

    public function index()
        {
            $data = array(
                'title' => "Import Matakuliah" ,
                'konten' => 'admin/import/index'
            );

            $this->load->view('admin/templates/template', $data, FALSE);
            
            // $this->load->view('import/index', $data);
        }

        public function create()
        {

            $data = array(
                'title' => "Upload File Excel",
                'konten' => 'admin/import/create' 
            );
            // $data['title'] = "Upload File Excel";
            // $this->load->view('import/create', $data);
            $this->load->view('admin/templates/template', $data, FALSE);
            
        }

        public function excel()
        {
            if(isset($_FILES["file"]["name"])){
                  // upload
                $file_tmp = $_FILES['file']['tmp_name'];
                $file_name = $_FILES['file']['name'];
                $file_size =$_FILES['file']['size'];
                $file_type=$_FILES['file']['type'];
                // move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads
                
                $object = PHPExcel_IOFactory::load($file_tmp);
        
                foreach($object->getWorksheetIterator() as $worksheet){
        
                    $highestRow = $worksheet->getHighestRow();
                    $highestColumn = $worksheet->getHighestColumn();
        
                    for($row=2; $row<=$highestRow; $row++){
        
                        $kode_matkul        = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                        $nama_matkul        = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                        $sks                = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                        $tahun_kurikulum    = $worksheet->getCellByColumnAndRow(3, $row)->getValue();

                        $data[] = array(
                            'kode_matkul'       => $kode_matkul,
                            'nama_matkul'       => $nama_matkul,
                            'sks'               => $sks,
                            'tahun_kurikulum'   => $tahun_kurikulum,
                            'id_user'           => $_SESSION['id_user'],
                        );
        
                    } 
        
                }
        
                $this->db->insert_batch('t_matkul', $data);
        
                $message = array(
                    'message'=>'<div class="alert alert-success">Import file excel berhasil disimpan di database</div>',
                );
                
                $this->session->set_flashdata($message);
                redirect('admin/import/create/', 'refresh');
            }
            else
            {
                 $message = array(
                    'message'=>'<div class="alert alert-danger">Import file gagal, coba lagi</div>',
                );
                
                $this->session->set_flashdata($message);
                redirect('admin/import/create/', 'refresh');
            }
        }

}

/* End of file C_import.php */
