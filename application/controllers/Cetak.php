<?php
class Cetak extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
    }

    function index()
    {
        $pdf = new FPDF('P', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Times', '', 14);
        // mencetak string 
       
        $pdf->SetFont('Times', 'B', 16);
        $pdf->Cell(200, 7, 'KLINIK Dr.H.A.DWI BUDI SATRIO M.kes', 0, 1, 'C');
        $pdf->SetFont('Times', '', 12);
        $pdf->Cell(200, 5, 'Jl.Muhidin No 29 Kutowinangun Kebumen, Telp (0287)661275', 0, 1, 'C');
        $pdf->Cell(200, 5, 'Email: kadinsos.kebumen2017@gmail.com', 0, 1, 'C');
        $pdf->SetLineWidth(0.7);
        $pdf->Line(8, 30, 200, 30);
        $pdf->SetLineWidth(0);
        $pdf->Line(8, 30.7, 200, 30.7);
        $pdf->SetFont('Times', 'BU', 12);
        $pdf->Cell(0, 5, '', 0, 1, 'C');
        $pdf->Cell(0, 10, 'LAPORAN REKAM MEDIS', 0, 1, 'C');
        $pdf->SetFont('Times', '', 12);

        $bulan = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );

        $pdf->SetFont('Times', 'BU', 12);
       
        $pdf->Cell(10, 1, '', 0, 1);
        $pdf->SetFont('Times', 'B', 10);
        $pdf->Cell(10, 6, 'NO', 1, 0, "C");
        $pdf->Cell(20, 6, 'NO PASIEN', 1, 0, "C");
        $pdf->Cell(45, 6, 'NIK', 1, 0, "C");
        $pdf->Cell(25, 6, 'NAMA', 1, 0, "C");
        $pdf->Cell(50, 6, 'ALAMAT', 1, 0, "C");
        $pdf->Cell(30, 6, 'KETERANGAN', 1, 1, "C");

        $pdf->SetFont('Times', '', 12);

        $this->db->select('*');
        $this->db->from('tbl_pasien');
        $hasil = $this->db->get()->result();
        $no = 1;
        foreach ($hasil as $row) {
            $pdf->Cell(10, 6, $no++, 1, 0, "C");
            $pdf->Cell(20, 6, $row->no_pasien, 1, 0,"C");
            $pdf->Cell(45, 6, $row->no_ktp, 1, 0, "C");
            $pdf->Cell(25, 6, $row->nama_pasien, 1, 0, "C");
            $pdf->Cell(50, 6, $row->alamat, 1, 0, "C");
            $pdf->Cell(30, 6, $row->keterangan, 1, 1, "C");
        }

        $pdf->Output('Rekam Medis.pdf', 'I');
    }

}
