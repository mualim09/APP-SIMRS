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

    // INPUT DATA PERPUSTAKAAN
    function input_perpus($table, $data)
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

    // UPDATE PERPUSTAKAAN
    function update_perpus($table,$data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update($table,$data);  
    }

////////////////////////////////////////////////DELETE////////////////////////////////
    // DELETE DATA APLIKASI
    function DeleteDataAplikasi($table,$id)
    {
        $this->db->delete($table,$id);
    }

    // DELETE DATA APLIKASI
    function DeleteDataPerpus($table,$id)
    {
        $this->db->delete($table,$id);
    }

}

