<?php  
Class Model_login extends CI_Model{
    
    
    function chek_login($username,$password){
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $user= $this->db->get('tbl_user')->row_array();
        return $user;
    }

    function register($username,$password){
        $data=array(
            'username'=> $this->input->post('username'),
            'password'=> $this->input->post('password'),
            'nama'=> $this->input->post('nama'),
            'alamat'=> $this->input->post('alamat'),
            'no_hp'=> $this->input->post('nohp'),
            'jenis_kelamin'=> $this->input->post('gender'),
            'level'=> "pasien"
        );
        $this->db->insert('tbl_user',$data);
    }
}



?>