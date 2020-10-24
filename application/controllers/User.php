<?php

Class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('Model_user');
    }

    function index() {
        $data['user'] = $this->db->get('tbl_user')->result();
        $this->template->load('template', 'user/list', $data);
    }

    function show_by_id() {
         $id = $_GET['id'];
        $sql_user = "select * from tbl_user where id='$id'";
        $user = $this->db->query($sql_user)->row_Array();
        $data = array(
            'id' => $user['id'],
            'nama_user' => $user['nama'],
            'alamat' => $user['alamat'],
            'jenis_kelamin' => $user['jenis_kelamin'],
            'level' => $user['level'],
            // 'jenis_dokter' => $dokter['jenis_dokter'],
            'no_hp' => $user['no_hp'],
            // 'foto' => $dokter['foto'],
        );
        echo json_encode($data);
    }

    function add() {
        if (isset($_POST['submit'])) {
            $upload = $this->upload();
            $this->Model_dokter->add($upload);
            redirect('Dokter');
        } else {
            $this->template->load('template', 'dokter/list', $data);
        }
    }

    function upload() {
        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'gif|png|jpg';
        $config['max_size'] = 10000;
        $this->load->library('upload', $config);
        $this->upload->do_upload('userfile');
        $uploads = $this->upload->data();
        return $uploads['file_name'];
    }

    function update() {
        if (isset($_POST['submit'])) {
            $upload = $this->upload();
            $this->Model_user->edit($upload);
            redirect('User');
        } else {
            $this->template->load('template', 'user/list', $data);
        }
    }

    function Hapus() {
        $id = $this->uri->segment(3);
        $this->db->where('id', $id);
        $this->db->delete('tbl_user');
        redirect('User');
    }

}
?>


