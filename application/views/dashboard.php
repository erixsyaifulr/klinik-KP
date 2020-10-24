

<div class="panel">
    <div class="panel-body">
        <div class="col-md-6 col-sm-12">
        <h3 class="animated fadeInLeft">KLINIK Dr.H.A.DWI BUDI SATRIO M.kes</h3>
        
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="col-md col-sm text-right" style="padding-left:10px;">
            <!-- <li class="time"> -->
                            <h1 class="animated fadeInLeft"><div id="output"></div></h1>
                            <h2 class="animated fadeInRight"><div id="jam"></div></h2>
                        <!-- </li> -->
            </div>
              
        </div>
    </div>                    
</div>

<div class="col-md-12" style="padding:20px;">
    <div class="col-md-12 padding-0">
        <div class="col-md-8 padding-0">
            <div class="col-md-12 padding-0">

                <?php  
                            $username= $this->session->userdata('username') ;
                            $level=$this->db->query("SELECT level as status FROM `tbl_user` where username='$username'")->result();
                            foreach ($level as $row) {
                                $status=$row->status;
                            }
                            if ($status=="admin"){
                    ?>

                <div class="col-md-6">
                    <div class="panel box-v1">
                        <div class="panel-heading bg-white border-none">
                            <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                                <h4 class="text-left">Jumlah Dokter</h4>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                <h4>
                                    <span class="icon-user icons icon text-right"></span>
                                </h4>
                            </div>
                        </div>
                        <div class="panel-body text-center">
                            <?php $jd=$this->db->query("SELECT COUNT(id_dokter) AS jumlah FROM `tbl_dokter`")->result();
 foreach ($jd as $row) {
     
                                echo "<h1>$row->jumlah</h1>";
 }
                            
                            ?>
                            <hr/>
                        </div>
                    </div>
                </div>

                <?php
                            }
                    ?>

                <div class="col-md-6">
                    <div class="panel box-v1">
                        <div class="panel-heading bg-white border-none">
                            <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                                <h4 class="text-left">Jumlah Pasien Hari Ini</h4>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                <h4>
                                    <span class="icon-basket-loaded icons icon text-right"></span>
                                </h4>
                            </div>
                        </div>
                        <div class="panel-body text-center">
                            <?php
                            $jumlah = $this->db->query("SELECT COUNT(id_pasien) as jumlah FROM `tbl_pasien`")->result();
                            foreach ($jumlah as $row) {
                                echo "<h1>$row->jumlah</h1>";
                            }
                            ?>
                            <hr/>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel box-v1">
                        <div class="panel-heading bg-white border-none">
                            <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                                <h4 class="text-left">Sisa Antrian</h4>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                <h4>
                                    <span class="icon-basket-loaded icons icon text-right"></span>
                                </h4>
                            </div>
                        </div>
                        <div class="panel-body text-center">
                            <?php
                            $jumlah = $this->db->query("SELECT COUNT(id_pasien) as jumlah FROM `tbl_pasien` where status='antri'")->result();
                            foreach ($jumlah as $row) {
                                echo "<h1>$row->jumlah</h1>";
                            }
                            ?>
                            <hr/>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- <div class="col-md-4">
            <div class="col-md-12 padding-0">
                <div class="panel box-v2">
                    <div class="panel-heading padding-0">
                        <img src="<?php echo base_url() ?>assets/img/bg2.jpg" class="box-v2-cover img-responsive"/>
                        <div class="box-v2-detail">
                            <img src="<?php echo base_url() ?>assets/img/avatar.jpg" class="img-responsive"/>
                            <h4><?php echo $this->session->userdata('username') ?></h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12 padding-0 text-center">
                            <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                                <h3>2.000</h3>
                                <p>Post</p>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-6 padding-0">
                                <h3>2.232</h3>
                                <p>share</p>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 padding-0">
                                <h3>4.320</h3>
                                <p>photos</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div> -->




        <!-- <div class="col-md-12">
            <div class="panel bg-green text-white">
                <div class="panel-body">
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="maps" style="height:300px;">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <canvas class="doughnut-chart hidden-xs"></canvas>
                        <div class="col-md-12">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <h1>72.993</h1>
                                <p>People</p>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <h1>12.000</h1>
                                <p>Active</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>