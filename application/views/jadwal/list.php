<div class="panel">
    <div class="panel-body">
        <div class="col-md-6">
           
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="row">
        <?php foreach ($jadwal as $row): ?>

            <div class="col-sm-6 col-md-3 product-grid">
                <div class="thumbnail">
                

                    <img src="<?php echo base_url() ?>uploads/<?php echo $row->foto; ?>" alt="...">
                    <div class="caption">
                    
                       
                        <h4><?php echo $row->nama_dokter ?></h4>
                        <p><h5>Alamat : <?php echo $row->alamat ?></h5></p>
                        <p><h5>No HP   : <?php echo $row->no_hp ?></h5></p>
                        <p><h6><span class="badge badge-primary"><?php echo $row->jenis_dokter ?></span></h6></p>
                       
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- end: content -->
