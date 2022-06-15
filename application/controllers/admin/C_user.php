  <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class C_user extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();
            //cek login
            if ($this->session->userdata($this->session->userdata('username')) != '') {
               redirect(base_url('admin/login'));
            }

            $this->load->model('admin/M_user', 'user');
        }

        public function list()
        {
            $data = array(
                'title'  => 'user',
                'menu'   => 'user',
                'script' => 'user',
                'konten' => 'admin/user/list'
            );

            $this->load->view('admin/templates/template', $data, FALSE);
        }

        function listSertifikat($id = NULL){
            // var_dump($id);  

            $data = $this->db->get_where('t_user', [$this->req->encKey('id') => $id])->row();


            $data = array(
                'title'  => "Detail Sertifikat user : " . $data->nama  ,
                'menu'   => 'user',
                'script' => 'detailmhs',
                'konten' => 'admin/user/listSertifikat' 
            );

            $this->load->view('admin/templates/template', $data, FALSE);
            
        }


        function getuser()
        {
            echo json_encode($this->user->data_user());
        }


        function data($id = NULL)
        {
            error_reporting(0);
            $list = $this->user->get_datatables($id);
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $field) {
                $idNa = $this->req->acak($field->id);
                // $idNa = $field->id;
                
                $status = ($field->status) == '1' ? "<button class='btn btn-success btn-xs' id='on' data-id='$idNa'><i class='fas fa-toggle-on'></i> On</button>" : "<button class='btn btn-danger btn-xs' id='off' data-id='$idNa'><i class='fas fa-toggle-off'></i> Off</button>";

                $url = base_url('admin/user/sertifikat/lihat/' . $idNa);
                $button = "
                <button class='btn btn-danger btn-xs' id='delete' data-id='$idNa'><i class='fas fa-trash-alt'></i></button>
                <button class='btn btn-warning btn-xs' id='edit' data-id='$idNa'><i class='fas fa-pencil-alt'></i></button>
                <button class='btn btn-info btn-xs' id='reset' data-id='$idNa'><i class='fas fa-sync-alt'></i></button>
                
                ";

                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $field->nama_user;
                $row[] = $field->username;
                $row[] = $field->keterangan;
                $row[] = $status;
                $row[] = $button;
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->user->count_all(),
                "recordsFiltered" => $this->user->count_filtered(),
                "data" => $data,
            );
            echo json_encode($output);
        }

        function get($id)
        {
            $data = $this->user->get($id);
            foreach ($data as $key => $value) {
                if (strtolower($key) == 'id') {
                    $data->$key = $this->req->acak($value);
                }
            }
            echo json_encode($data);
        }

        function getprodi(){
             echo json_encode($this->user->data_prodi());
        }

        function getJenis(){
             echo json_encode($this->user->data_jenis());
        }

        function getTingkat(){
             echo json_encode($this->user->data_tingkat());
        }

        function insert()
        {
            $custom = [
                'password' => $this->req->acak("123")
            ];
            $data = $this->req->all($custom);
            if ($this->user->insert($data) == true) {
                $msg = array(
                    'status' => 'ok',
                    'msg' => 'Berhasil menambahkan data !'
                );
            } else {
                $msg = array(
                    'status' => 'fail',
                    'msg' => 'Gagal menambahkan data !'
                );
            }
            echo json_encode($msg);
        }

        function set($id, $action)
    {
        if ($action == 'on') {
            if ($this->user->update(['status' => '1'], $this->req->id($id)) == true) {
                $msg = array(
                    'status' => 'ok',
                    'msg' => 'Berhasil Mengaktifkan Akun !'
                );
            } else {
                $msg = array(
                    'status' => 'fail',
                    'msg' => 'Gagal menambahkan data !'
                );
            }
            echo json_encode($msg);
        } elseif ($action == 'off') {
            if ($this->user->update(['status' => '0'], $this->req->id($id)) == true) {
                $msg = array(
                    'status' => 'ok',
                    'msg' => 'Berhasil Me-nonaktifkan Akun !'
                );
            } else {
                $msg = array(
                    'status' => 'fail',
                    'msg' => 'Gagal Me-nonaktifkan data !'
                );
            }
            echo json_encode($msg);
        } elseif ($action == 'reset') {
            if ($this->user->update(['password' => $this->req->acak('123')], $this->req->id($id)) == true) {
                $msg = array(
                    'status' => 'ok',
                    'msg' => 'Berhasil Me-reset Akun !'
                );
            } else {
                $msg = array(
                    'status' => 'fail',
                    'msg' => 'Gagal Me-reset data! kata sandi sudah default'
                );
            }
            echo json_encode($msg);
        }
    }



        function update()
        {

            // $this->req->print($_POST);

            $id = $this->input->post('id');
            $data = $this->req->all(['id' => false]);
            if ($this->user->update($data, $this->req->id($id)) == true) {
                $msg = array(
                    'status' => 'ok',
                    'msg' => 'Berhasil mengubah data !'
                );
            } else {
                $msg = array(
                    'status' => 'fail',
                    'msg' => 'Gagal mengubah data !'
                );
            }
            // echo $this->db->last_query();
            echo json_encode($msg);
        }

        function delete($id)
        {
            if ($this->user->delete($this->req->id($id)) == true) {
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
