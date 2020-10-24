<?php

Class Model_user extends CI_Model {

    function add($foto) {
        $data = array(
            'nama_dokter' => $this->input->post('nama_dokter'),
            'alamat' => $this->input->post('alamat'),
            'jenis_dokter' => $this->input->post('jenis'),
            'no_hp' => $this->input->post('no_hp'),
            'foto' => $foto
        );
        $this->db->insert('tbl_dokter', $data);
    }

    function edit() {
            $data = array(
                'nama' => $this->input->post('nama_user'),
                'alamat' => $this->input->post('alamat'),
                'jenis_kelamin' => $this->input->post('gender'),
                'level' => $this->input->post('level'),
                'no_hp' => $this->input->post('no_hp')
            );
            $id = $this->input->post('id');
            $this->db->where('id', $id);
            $this->db->update('tbl_user', $data);
            
        
    }

}

?>