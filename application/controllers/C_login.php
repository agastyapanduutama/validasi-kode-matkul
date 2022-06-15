<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_login', 'login');
    }

    public function index()
    {
        show_404();
    }


    public function login()
    {
        $data = array(
            // 'script' => 'login',
        );
        $this->load->view('admin/v_login', $data);
    }

    function aksi()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        $where = array(
            'username' => $user,
            'password' => $this->req->acak($pass)
        );

        if ($this->login->cek($where) == true) {
            $userData = $this->login->getData();
            if ($userData->status == 1) {
                $session = array(
                    'id_user'   => $userData->id,
                    'username'  => $userData->username,
                    'level'     => $userData->level,
                    'nama_user' => $userData->nama_user,
                    'logged_in' => true,
                );
                // var_dump($session);
                $this->session->set_userdata($session);
                redirect('admin/dashboard', 'refresh');
            } else {
                
                // $this->req->print($_POST);
                $this->session->set_flashdata('warning', "Username atau Password Salah");
                redirect('admin/login', 'refresh');
            }
        } else {

            $this->session->set_flashdata('warning', "Username atau Password Salah");
            redirect('admin/login', 'refresh');
        }
    }

    public function logout()
    {
        $token = $this->uri->segment('4');
        if ($this->session->userdata('token') == $token) {
            $this->session->sess_destroy();
            redirect(base_url('admin/login'));
        } else {
            show_404();
        }
    }
}
