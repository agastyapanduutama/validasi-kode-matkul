<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_matkul extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_matkul' ,'matkul');
        
    }
    

    public function index()
    {
        $matkul = $this->matkul->getMatkul(10);
        $data = array(
            'matkul' => $matkul,
            'title'  => 'matkul',
            'menu'   => 'matkul',
            'konten' => 'admin/matkul/index'
        );

        $this->load->view('admin/templates/template', $data, FALSE);
    }

    public function list()
    {
        $matkul = $this->matkul->getMatkul();
        $data = array(
            'matkul' => $matkul,
            'title'  => 'matkul',
            'menu'   => 'matkul',
            'script' => 'matkul',
            'konten' => 'admin/matkul/list'
        );

        $this->load->view('admin/templates/template', $data, FALSE);
    }

    public function data()
    {
        error_reporting(0);
        $list = $this->matkul->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $idNa = $this->req->acak($field->id);
            // $idNa = $field->id;
            
            $button = "
            <button class='btn btn-danger btn-sm' id='delete' data-id='$idNa' title='Hapus Data'><i class='fas fa-trash-alt'></i></button>
            ";

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->kode_matkul;
            $row[] = $field->nama_matkul;
            $row[] = $field->sks;
            $row[] = $field->tahun_kurikulum    ;
            $row[] = $button;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->matkul->count_all(),
            "recordsFiltered" => $this->matkul->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function cekMatkul()
    {
        $kode = $this->input->post('kode_matkul');
        $data = $this->matkul->cekMatkul($kode);
        if($data != ""){
            $this->session->set_flashdata('warning', 'Kode Matkul Sudah digunakan ' . $data->kode_matkul . "  " . $data->nama_matkul);
            redirect('admin/matkul','refresh');
        }else{
            $this->session->set_flashdata('success', 'Kode tersedia');
            redirect('admin/matkul','refresh');
        }

    }

    public function addMatkul()
    {
        # code...
    }

    public function storeMatkul()
    {
        $kode = $this->input->post('kode_matkul');
        $data = $this->matkul->cekMatkul($kode);
        if($data != ""){
            $this->session->set_flashdata('warning', 'Kode Matkul Sudah digunakan oleh matkul ' . $data->kode_matkul . " - " . $data->nama_matkul);
            redirect('admin/matkul','refresh');
        }else{
            $data = $this->req->all();
            $this->matkul->storeMatkul($data);
            $this->session->set_flashdata('success', 'Berhasil Menambahkan Data');
            redirect('admin/matkul','refresh');
        }
    }

    public function deleteMatkul($id)
    {
        $this->matkul->deleteMatkul($id);
        $this->session->set_flashdata('success', 'Berhasil Menghapus Data');
        redirect('admin/matkul','refresh');
    }

     function delete($id)
        {
            if ($this->matkul->delete($this->req->id($id)) == true) {
                $msg = array(
                    'status' => 'ok',
                    'msg' => 'Berhasil menghapus data !'
                );
            } else {
                $msg = array(
                    'status' => 'fail',
                    'msg' => 'Gagal menghapus data !'
                );
            }
            echo json_encode($msg);
        }


}

/* End of file C_matkul.php */
