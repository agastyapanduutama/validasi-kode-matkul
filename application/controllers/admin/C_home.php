<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class C_home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_matkul' ,'matkul');
        
    }
    

    public function index()
    {
        
    }

    public function dashboard()
    {
        
        $totalmatkul = $this->matkul->getTotalMatkul();
        $matkul = $this->matkul->getMatkul(10);
        $data = array(
            'totalmatkul' => $totalmatkul,
            'matkul' => $matkul,
            'title' => "Beranda" , 
            'konten' => 'admin/v_dashboard'
        );

        $this->load->view('admin/templates/template', $data, FALSE);
        
    }

}

/* End of file C_home.php */
