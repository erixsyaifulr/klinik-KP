<!-- start: Content -->
<div class="panel box-shadow-none content-header">
    
</div>



<div class="col-md-12 top-20 padding-0">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading"><h3>Antrian Pasien</h3></div>
            <div class="panel-body">
                <div class="responsive-table">
                    <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Pasien</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Alamat</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             $username= $this->session->userdata('username') ;
                             $jd=$this->db->query("SELECT id AS id FROM `tbl_user` where username='$username'")->result();
                             foreach ($jd as $roww) {  
                                $id=$roww->id;
                             }
                            $no = 1;
                            foreach ($daftar as $row):
                                if($id==$row->id_user){
                                ?>
                                    <tr style="background-color:#adff2f">
                                <?php
                                }
                                else{
                                ?>
                                    <tr>
                                <?php
                                }
                                ?>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row->no_pasien; ?></td>
                                    <td><?php echo $row->nama_pasien; ?></td>
                                    <td><?php echo $row->tanggal; ?></td>
                                    <td><?php echo $row->alamat; ?></td>
                                   </tr>
                                <?php
                                $no++;
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  
</div>

<!-- end: content -->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sesuaikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Pendaftaran/update') ?>
                <div class="row">
                    <div class="col-md-6">
                        <span class="icon-user">Nama Pasien</span>
                        <input type="text" required="" name="nama_pasien" id="nama_pasien" class="form-control">
                        <input type="hidden" id="id_pasien" name="id_pasien">
                    </div>
                    <div class="col-md-6">
                        <span class="icon-user">Alamat</span>
                        <textarea name="alamat" required="" class="form-control" id="alamat"></textarea>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <span class="fa fa-caret-square-o-down">Jenis Pasien</span>
                        <?php echo cmb_dinamis('jenis_pasien','jenis_berobat','jenis_pasien','id',null,null,'id="jenis_pasien"'); ?>
                    </div>
                    <div class="col-md-6">
                        <span class="fa-star-half">keterangan</span>
                        <textarea class="form-control" required="" name="keterangan" id="keterangan"></textarea> 
                    </div>
                    
                    <div class="col-md-6">
                        <span class="fa-star-half">NO ktp</span>
                        <input required="" type="text" name="no_ktp" id="no_ktp" class="form-control"> 
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning btn-sm btn-3d" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary btn-sm btn-3d">Save</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    function show_by_id(id_pasien) {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>Pendaftaran/show_by_id',
            data: 'id_pasien=' + id_pasien,
            success: function (data) {
                var json = data,
                        obj = JSON.parse(json);
                $("#id_pasien").val(obj.id_pasien);
                $("#nama_pasien").val(obj.nama_pasien);
                $("#alamat").val(obj.alamat);
                $("#no_ktp").val(obj.no_ktp);
                $("#keterangan").val(obj.keterangan);
                $("#jenis_pasien").val(obj.jenis_pasien);
            }
        })
    }

</script>