
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form Penambahan Stok Buku</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="row">
                        <div class="col-lg-6">

                            <form action="<?php echo base_url(); ?>index.php/admin/do_edit_stokbuku/<?php echo $edit_stokbuku->KD_BUKU;?>" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>KODE BUKU</label>
                                    <input class="form-control" placeholder="Enter text" name="kode_buku" value="<?php echo $edit_stokbuku->KD_BUKU; ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>NAMA BUKU</label>
                                    <input class="form-control" placeholder="Enter text" name="nama_buku" value="<?php echo $edit_stokbuku->NM_BUKU; ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>JUMLAH STOK</label>
                                    <input type="number" class="form-control" placeholder="Enter text" name="jumlah_stok" value="<?php echo $edit_stokbuku->JML_STOK; ?>" required>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                                <a href="<?php echo base_url();?>index.php/admin/lihat_stok_buku" class="btn btn-primary">
                                Back
                                </a>
                            </form>

                        </div>
                        <!-- /.col-lg-12 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                       
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->