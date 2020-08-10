<?php

class M_MasterData extends CI_Model{

////////////////////////////////////////////////CEK LOGIN////////////////////////////////
// Cek Login
    function cek_login($table,$data){      
        $query = $this->db->get_where($table,$data);

        if ($query->num_rows() == 1) {
            return $query->row();
        }else{
            return false;
        }
    }
////////////////////////////////////////////////GET////////////////////////////////

////////////////////////////////////////////////INPUT////////////////////////////////
// INPUT DATA APLIKASI
    function input_aplikasi($table, $data)
    {
        $this->db->insert($table,$data);
    }

////////////////////////////////////////////////UPDATE////////////////////////////////
// UPDATE APLIKASI
    function update_aplikasi($table,$data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update($table,$data);  
    }

////////////////////////////////////////////////DELETE////////////////////////////////
// Delete data pemesanan
    function DeleteDataAplikasi($table,$id)
    {
        $this->db->delete($table,$id);
    }

}

