<?php

Class Model_dokter extends CI_Model {

    function add($foto) {
        $data = array(
            'nama_dokter' => $this->input->post('nama_dokter'),
            'alamat' => $this->input->post('alamat'),
            'jenis_dokter' => $this->input->post('jenis'),
            'no_hp' => $this->input->post('no_hp'),
            'foto' => $foto,
            'status' => "Tidak aktif"
        );
        $this->db->insert('tbl_dokter', $data);
    }

    function edit($foto) {
        if (empty($foto)) {
            $data = array(
                'nama_dokter' => $this->input->post('nama_dokter'),
                'alamat' => $this->input->post('alamat'),
                'jenis_dokter' => $this->input->post('jenis'),
                'no_hp' => $this->input->post('no_hp'),
            );
            $id_dokter = $this->input->post('id_dokter');
            $this->db->where('id_dokter', $id_dokter);
            $this->db->update('tbl_dokter', $data);
        }else{
            $data = array(
                'nama_dokter' => $this->input->post('nama_dokter'),
                'alamat' => $this->input->post('alamat'),
                'jenis_dokter' => $this->input->post('jenis'),
                'no_hp' => $this->input->post('no_hp'),
                'foto' => $foto
            );
            $id_dokter = $this->input->post('id_dokter');
            $this->db->where('id_dokter', $id_dokter);
            $this->db->update('tbl_dokter', $data);
            
        }
    }

    function aktif(){
        $data = array(
            'status' =>"Aktif"
           
        );
        $id_dokter= $this->input->post('id_dokter');
        $this->db->where('id_dokter',$id_dokter);
        $this->db->update('tbl_dokter',$data);
    }
    
    function tidak_aktif(){
        $data = array(
            'status' =>"Tidak aktif"
           
        );
        $id_dokter= $this->input->post('id_dokter');
        $this->db->where('id_dokter',$id_dokter);
        $this->db->update('tbl_dokter',$data);
    }

}

?>