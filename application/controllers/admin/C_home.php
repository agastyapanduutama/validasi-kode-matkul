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

     public function profil()
    {
        $profil = $this->db->get_where('t_user', ['id'=> $_SESSION['id_user']])->row();

        $data = array(
            'title' => "Ganti Password",
            'profil' => $profil,
            'konten' => 'admin/pengaturan/profile'
        );

        $this->load->view('admin/templates/template', $data, FALSE);
    }

    public function updatePass()
    {
        $custom = [
            'password_lama' => false,
            'password' => $this->req->acak($_POST['password'])
        ];
        $data = $this->req->all($custom);

        $cekPass = $this->db->get_where('t_user', ['id'=> $_SESSION['id_user'], 'password' => $this->req->acak($_POST['password_lama'])])->row();

        
        if ($cekPass != '') {
            $this->db->where('id', $_SESSION['id_user']);
            $this->db->update('t_user', $data);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', "Berhasil memperbarui Password");
                redirect('admin/profil', 'refresh');
            } else {
                $this->session->set_flashdata('warning', "Gagal memperbarui Password");
                redirect('admin/profil', 'refresh');
            }
        }else{
            $this->session->set_flashdata('warning', "Password tidak sesuai dengan yang lama");
            redirect('admin/profil', 'refresh');
        }
        
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
