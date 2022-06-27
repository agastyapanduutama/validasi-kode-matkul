<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_matkul extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->table = "t_matkul";
        $this->column_order = array(null, 'nama_matkul', 'kode_matkul' , 'sks' ,'tahun_kurikulum');
        $this->column_search = array('nama_matkul', 'kode_matkul' , 'sks' ,'tahun_kurikulum');
        $this->order = array('id' => 'desc');
    }

    private function _get_datatables_query()
    {

        $this->db->from($this->table);
        $this->db->where('id_user', $_SESSION['id_user']);
        

        $i = 0;

        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {

                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


    public function cekMatkul($kode)
    {
        $this->db->from('t_matkul');
        $this->db->where('kode_matkul', $kode);
        return $this->db->get()->row();
    }


    public function storeMatkul($data)
    {
        return $this->db->insert('t_matkul', $data);        
    }

    public function updateMatkul()
    {
        # code...
    }

    public function deleteMatkul($kode)
    {
        $this->db->where('id', $kode);
        $this->db->delete('t_matkul');
    }

    public function getMatkul($limit = NULL)
    {
        $this->db->from('t_matkul');
        if ($limit != NULL) {
            $this->db->limit($limit);
        }
        $this->db->where('id_user', $_SESSION['id_user']);
        return $this->db->get()->result();
    }

    
    function delete($where)
    {
        $this->db->where($where);
        $this->db->delete($this->table);
        return $this->cekPerubahan();
    }

    
    function cekPerubahan()
    {
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getTotalMatkul()
    {
        $this->db->from('t_matkul');
        $this->db->where('id', $_SESSION['id_user']);
        return $this->db->get()->num_rows();
        
    }




}

/* End of file M_matkul.php */
