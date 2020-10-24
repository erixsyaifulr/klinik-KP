
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="description" content="Miminium Admin Template v.1">
        <meta name="author" content="Isna Nur Azis">
        <meta name="keyword" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>KLINIK Dr.H.A.DWI BUDI SATRIO M.kes</title>

        <!-- start: Css -->
        <link rel="stylesheet" type="text/css" href="<?php  echo base_url() ?>assets/css/bootstrap.min.css">

        <!-- plugins -->
        <link rel="stylesheet" type="text/css" href="<?php  echo base_url() ?>assets/css/plugins/font-awesome.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php  echo base_url() ?>assets/css/plugins/simple-line-icons.css"/>
        <link rel="stylesheet" type="text/css" href="<?php  echo base_url() ?>assets/css/plugins/animate.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php  echo base_url() ?>assets/css/plugins/fullcalendar.min.css"/>
        <link href="<?php  echo base_url() ?>assets/css/style.css" rel="stylesheet">
        <!-- end: Css -->
        <!-- <link rel="shortcut icon" href="<?php  echo base_url() ?>images/loo.png"> -->

        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css"> -->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style type="text/css">
            #output{
            font-size:40px;
            font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
            text-align:right;
           
            color:#666;
            }
        </style>
    </head>

    <body id="mimin" class="dashboard">
        <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
            <div class="col-md-12 nav-wrapper">
                <div class="navbar-header" style="width:100%;">
                    <div class="opener-left-menu is-open">
                        <span class="top"></span>
                        <span class="middle"></span>
                        <span class="bottom"></span>
                    </div>
                    <a href="<?php echo site_url('Dashboard') ?>" class="navbar-brand"> 
                    <?php  
                            $username= $this->session->userdata('username') ;
                            $level=$this->db->query("SELECT level as status FROM `tbl_user` where username='$username'")->result();
                            foreach ($level as $row) {
                                $status=$row->status;
                            }
                            if ($status=="admin"){
                        ?>
                        <b>ADMIN</b>
                        <?php
                            }
                            else{
                        ?>
                        <b><?php echo "$username";?></b>
                        <?php
                            }
                        ?>
                    </a>

                    <ul class="nav navbar-nav search-nav">
                        <li>
                            <div class="search">
                                <?php echo anchor('Auth/logout',' <span class="fa fa-sign-out icon-sign-out" style="font-size:23px;"></span>');?>
                                <div class="form-group form-animate-text">
                                    <span class="bar"></span>
                                    <label><b style="color:white;">Logout</b></label>
                                </div>
                            </div>
                        </li>
                        <?php  
                            $username= $this->session->userdata('username') ;
                            $level=$this->db->query("SELECT level as status FROM `tbl_user` where username='$username'")->result();
                            foreach ($level as $row) {
                                $status=$row->status;
                            }
                            if ($status=="admin"){
                        ?>
                        <li>
                            <div class="search">
                            <?php echo anchor('Pendaftaran/daftar',' <span class="fa fa-user icon-sign-out" style="font-size:23px;"></span>');?>
                                <div class="form-group form-animate-text">
                                    <span class="bar"></span>
                                    <label><b style="color:white;">Pendaftaran</b></label>
                                </div>
                            </div>
                        </li>

                        <?php
                            }
                        ?>
                       
                        
                        <li>
                            <div class="search">
                                <!-- <?php echo anchor('Tes',' <span class="fa fa-users icon-sign-out" style="font-size:23px;"></span>');?>
                                <div class="form-group form-animate-text">
                                    <span class="bar"></span>
                                    <label><b style="color:white;">Tes Golongan Darah</b></label>
                                </div> -->
                            </div>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right user-nav">
                        <li class="user-name"><span><?php echo $this->session->userdata('username') ?></span></li>
                       <img src="<?php echo base_url()?>assets/img/avatar.jpg" class="img-circle avatar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                     </ul>
                </div>
            </div>
        </nav>
        <!-- end: Header -->

        <div class="container-fluid mimin-wrapper">

            <!-- start:Left Menu -->
            <div id="left-menu">
                <div class="sub-left-menu scroll">
                    <ul class="nav nav-list">
                        <li><div class="left-bg"></div></li>
                        <!-- <li class="time">
                            <h1 class="animated fadeInLeft">21:00</h1>
                            <p class="animated fadeInRight">Sat,October 1st 2029</p>
                        </li> -->


                        <?php  
                            $username= $this->session->userdata('username') ;
                            $level=$this->db->query("SELECT level as status FROM `tbl_user` where username='$username'")->result();
                            foreach ($level as $row) {
                                $status=$row->status;
                            }
                            if ($status=="admin"){
                        ?>
                        <li class="ripple"><a href="<?php echo site_url('Dashboard') ?>"><span class="fa fa-home"></span>Dashborad</a></li>
                        <li class="ripple"><a href="<?php echo site_url('Dokter') ?>"><span class="fa fa-hospital-o"></span>Dokter</a></li>
                        <li class="ripple"><a href="<?php echo site_url('User') ?>"><span class="fa fa-user"></span>User</a></li>
                        <li class="ripple"><a href="<?php echo site_url('Jenis_berobat') ?>"><span class="fa fa-pencil-square-o"></span>Jenis Pasien</a></li>
                        <li class="ripple"><a href="<?php echo site_url('Pendaftaran') ?>"><span class="fa fa-group"></span>Pasien</a></li>
                        <li class="ripple"><a href="<?php echo site_url('Pendaftaran/index_antrian') ?>"><span class="fa fa-group"></span>Antrian Pasien</a></li>
                        <!-- <li class="ripple"><a href="<?php echo site_url('User/show_by_id') ?>"><span class="fa fa-group"></span>Antrian Pasien</a></li> -->

                       <?php
                            }
                            if ($status=="pasien"){
                       ?>
                        <li class="ripple"><a href="<?php echo site_url('Dashboard') ?>"><span class="fa fa-home"></span>Dashborad</a></li>
                        <li class="ripple"><a href="<?php echo site_url('Jadwal') ?>"><span class="fa fa-user"></span>Dokter Hari Ini</a></li>
                        <li class="ripple"><a href="<?php echo site_url('Pendaftaran') ?>"><span class="fa fa-user"></span>Pendaftaran</a></li>
                        <li class="ripple"><a href="<?php echo site_url('Pendaftaran/antrian') ?>"><span class="fa fa-group"></span>Antrian Pasien</a></li>
                       <?php
                            }
                        ?>
                       </ul>
                </div>
            </div>
            <!-- end: Left Menu -->
        </div>

            <!-- start: content -->
            <div id="content">
                <?php echo $contents  ?>
            </div>
            <!-- end: content -->



                
                        

        <!-- start: Mobile -->
        
        <!-- start: Javascript -->

        <script type="text/javascript">
            window.setTimeout("waktu()",1000);    
            function waktu() {     
            var tanggal = new Date();    
            setTimeout("waktu()",1000);    
            document.getElementById("output").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();  
            }   

            var tanggallengkap = new String();
            var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
            namahari = namahari.split(" ");
            var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
            namabulan = namabulan.split(" ");
            var tgl = new Date();
            var hari = tgl.getDay();
            var tanggal = tgl.getDate();
            var bulan = tgl.getMonth();
            var tahun = tgl.getFullYear();
            tanggallengkap = namahari[hari] + ", " +tanggal + " " + namabulan[bulan] + " " + tahun;
            document.getElementById("jam").innerHTML = tanggallengkap;

        </script>

        <script src="<?php  echo base_url() ?>assets/js/jquery.min.js"></script>
        <script src="<?php  echo base_url() ?>assets/js/jquery.ui.min.js"></script>
        <script src="<?php  echo base_url() ?>assets/js/bootstrap.min.js"></script>

       <script src="<?php  echo base_url() ?>assets/js/plugins/jquery.datatables.min.js"></script>
       <script src="<?php  echo base_url() ?>assets/js/plugins/datatables.bootstrap.min.js"></script>

        <!-- plugins -->
        <script src="<?php  echo base_url() ?>assets/js/plugins/moment.min.js"></script>
        <script src="<?php  echo base_url() ?>assets/js/plugins/jquery.vmap.min.js"></script>
        <script src="<?php  echo base_url() ?>assets/js/plugins/maps/jquery.vmap.world.js"></script>
        <script src="<?php  echo base_url() ?>assets/js/plugins/jquery.vmap.sampledata.js"></script>

        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script> -->
   

        <!-- custom -->
        <script src="<?php  echo base_url() ?>assets/js/main.js"></script>
        <script type="text/javascript">
            (function (jQuery) {
                jQuery('.maps').vectorMap({
                    map: 'world_en',
                    backgroundColor: null,
                    color: '#fff',
                    hoverOpacity: 0.7,
                    selectedColor: '#666666',
                    enableZoom: true,
                    showTooltip: true,
                    values: sample_data,
                    scaleColors: ['#C8EEFF', '#006491'],
                    normalizeFunction: 'polynomial'
                });

                // end: Maps==============

            })(jQuery);
            
  $(document).ready(function(){
    $('#datatables-example').DataTable();
    // $('#datatables-example').DataTable({
    //         dom: 'Bfrtip',
    //         buttons: ['excel', 'pdf', 'print']
    //     });
  });
        </script>
        <script type="text/javascript">
</script>
        <!-- end: Javascript -->
    </body>
</html>