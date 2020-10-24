<div class="panel box-shadow-none content-header">
    <div class="panel-body">
        <!-- <div class="row">
            <div class="col-md-12">
                <span><h3 class="animated fadeInLeft">Tambah Dokter</h3></span>
                <p class="animated fadeInDown">
                    <button class="btn btn-circle btn-3d btn-lg btn-primary"  data-toggle="modal" data-target="#exampleModal">
                        <span class="fa fa-paper-plane-o"></span>
                    </button>
                </p>
            </div>
        </div> -->
    </div>
</div>



<!-- Modal for edit -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('User/update') ?>
                <div class="row">
                    <div class="col-md-6">
                        <span class="icon-user">Nama User</span>
                        <input type="hidden" id="id" name="id">
                        <input type="text" id="nama_user" name="nama_user" class="form-control" placeholder="Nama">
                    </div>
                    <div class="col-md-6">
                        <span class="icon-user">Alamat</span>
                        <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat">
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <span class="icon-phone">No HP</span>
                        <input type="number" id="no_hp" name="no_hp" class="form-control" placeholder="No handphone">
                    </div>

                    <div class="col-md-6">
                        <span class="icon-user">Jenis Kelamin</span>
                        <br>
                        <input type="radio" id="male" name="gender" value="Laki - laki"> Laki - Laki
                        <br>
                        <input type="radio" id="female" name="gender" value="Perempuan"> Perempuan
        
                    </div>
                </div>
                <hr>

                <div class="row">
                   
                <div class="col-md-6">
                        <span class="icon-user">Level</span>
                        <br>
                       <select id="level" name="level">
                        <option value="admin">admin</option>
                        <option value="pasien">pasien</option>
                      </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Modal for edit -->

<div class="col-md-12 top-20 padding-0">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading"><h3>Data User</h3></div>
            <div class="panel-body">
                <div class="responsive-table">
                    <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No Hp</th>
                                <th>Jenis Kelamin</th>
                                <th>Level</th>
                                <th>Aksi Edit</th>
                                <th>Aksi Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($user as $row){
                                echo "
                             <tr>
                                <td>$no</td>
                                <td>$row->nama</td>
                                <td>$row->alamat</td>
                                <td>$row->no_hp</td>
                                <td>$row->jenis_kelamin</td>
                                <td>$row->level</td>
                                <td><button type='button' class='btn btn-3d btn-danger btn-sm' data-toggle='modal' onclick=show_by_id($row->id) data-target='#Modal'>Edit</button></td>
                                <td>" . anchor('User/Hapus/' . $row->id, 'Hapus', array('class' => 'btn btn-3d btn-info btn-sm')) . "</td>
                             </tr>";
                            $no++;}
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  
</div>
<script type="text/javascript">
    function show_by_id(id) {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>User/show_by_id',
            data: 'id=' + id,
            success: function (data) {
                var json = data,
                        obj = JSON.parse(json);
                $("#id").val(obj.id);
                $("#nama_user").val(obj.nama_user);
                $("#alamat").val(obj.alamat);
                $("#no_hp").val(obj.no_hp);
                document.getElementById('level').value = obj.level;
                if(obj.jenis_kelamin=="Laki - laki"){
                    document.getElementById("male").checked = true;
                    document.getElementById("female").checked = false;
                }
               else{
                    document.getElementById("female").checked = true;
                    document.getElementById("male").checked = false;
                }
                
                // $("#foto").val(obj.foto);
                // $("#jenis_dokter").val(obj.jenis_dokter);
            }
        })
    }

</script>