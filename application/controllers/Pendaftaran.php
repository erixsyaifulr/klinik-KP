<?php

class Pendaftaran extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('Model_pendaftaran');
    }

    function index() {
        $data['daftar'] = $this->db->query("SELECT ts.no_ktp,ts.id_pasien,ts.no_pasien,ts.nama_pasien,ts.alamat,ts.keterangan,ts.tanggal,js.jenis_pasien,ts.status FROM tbl_pasien as ts, jenis_berobat as js WHERE ts.id_jenis_pasien=js.id")->result();
        $username= $this->session->userdata('username') ;
                            $level=$this->db->query("SELECT level as status FROM `tbl_user` where username='$username'")->result();
                            foreach ($level as $row) {
                                $status=$row->status;
                            }
                            if ($status=="admin"){
                                $this->template->load('template', 'pendaftaran/list', $data);
                            }
                            if ($status=="pasien"){
                                $this->template->load('template', 'pendaftaran/list_pasien', $data);
                            }
       
    }

    function index_antrian() {
        $data['daftar'] = $this->db->query("SELECT ts.no_ktp,ts.id_pasien,ts.no_pasien,ts.nama_pasien,ts.alamat,ts.keterangan,ts.tanggal,js.jenis_pasien,ts.status FROM tbl_pasien as ts, jenis_berobat as js WHERE ts.id_jenis_pasien=js.id and status='antri'")->result();
        $username= $this->session->userdata('username') ;
                            $level=$this->db->query("SELECT level as status FROM `tbl_user` where username='$username'")->result();
                            foreach ($level as $row) {
                                $status=$row->status;
                            }
                            if ($status=="admin"){
                                $this->template->load('template', 'pendaftaran/list_antrian', $data);
                            }
                            if ($status=="pasien"){
                                $this->template->load('template', 'pendaftaran/list_pasien', $data);
                            }
       
    }

    function daftar() {
         $this->template->load('template', 'pendaftaran/list_pasien');
                      
    }

    function antrian() {
        $data['daftar'] = $this->db->query("SELECT ts.no_ktp,ts.id_pasien,ts.id_user,ts.no_pasien,ts.nama_pasien,ts.alamat,ts.keterangan,ts.tanggal,js.jenis_pasien FROM tbl_pasien as ts, jenis_berobat as js WHERE ts.id_jenis_pasien=js.id and status='antri'")->result();
        $this->template->load('template', 'pendaftaran/antrian_pasien', $data);
    }

    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_pendaftaran->add();

            $username= $this->session->userdata('username') ;
            $level=$this->db->query("SELECT level as status FROM `tbl_user` where username='$username'")->result();
            foreach ($level as $row) {
                $status=$row->status;
            }
            if ($status=="admin"){
                redirect('Pendaftaran');
            }
            if ($status=="pasien"){
                redirect('Pendaftaran/antrian');
            }

           
        } else {
            $this->template->load('template', 'pendaftaran/list');
        }
    }

    function show_by_id() {
         $id_pasien = $_GET['id_pasien'];
        $sql_pasien = "select * from tbl_pasien where id_pasien='$id_pasien'";
        $dokter = $this->db->query($sql_pasien)->row_Array();
        $data = array(
            'id_pasien' => $dokter['id_pasien'],
            'nama_pasien' => $dokter['nama_pasien'],
            'alamat' => $dokter['alamat'],
            'id_jenis_pasien' => $dokter['id_jenis_pasien'],
            'no_ktp' => $dokter['no_ktp'],
            'keterangan' => $dokter['keterangan'],
        );
        echo json_encode($data);
    }
    
    
    function update(){
        if (isset($_POST['submit'])) {
            $this->Model_pendaftaran->update();
            redirect('Pendaftaran');
        } else {
            $this->template->load('template', 'pendaftaran/list');
            
        }
    }
    
    function selesai(){
        if (isset($_POST['submit'])) {
            $this->Model_pendaftaran->update_status();
            redirect('Pendaftaran/index_antrian');
        } else {
            $this->template->load('template', 'pendaftaran/list');
            
        }
    }
    
    
    function hapus(){
        $id= $this->uri->segment(3);
        $this->db->where('id_pasien',$id);
        $this->db->delete('tbl_pasien');
        redirect('Pendaftaran');
    }

}
?>

