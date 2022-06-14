<?php

class M_login extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function cek($data)
    {
        $cek = $this->db->get_where('t_user', $data)->num_rows();
        if ($cek > 0) {
            return true;
        } else {
            return false;
        }
    }

    function getData()
    {
        return $this->db->query($this->db->last_query())->row();
    }

    function cekDataById($data)
    {
        $cek = $this->db->get_where('t_user', $data)->num_rows();
        if ($cek > 0) {
            return true;
        } else {
            return false;
        }
    }
}
