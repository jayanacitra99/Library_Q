
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form Edit Buku</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="row">
                        <div class="col-lg-6">

                            <form action="<?php echo base_url(); ?>index.php/admin/do_edit_buku/<?php echo $edit_buku->KD_BUKU;?>" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>KODE BUKU</label>
                                    <input class="form-control" placeholder="Enter text" name="kode_buku" value="<?php echo $edit_buku->KD_BUKU; ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>KODE SUPPLIER</label>
                                    <select class="form-control" name="kode_supplier">
                                        <?php
                                            foreach ($supplier_insert as $data) {
                                                echo '
                                                <option value="'.$data->KD_SUPPLIER.'">'.$data->KD_SUPPLIER.'</option>
                                                ';
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>ID ADMIN</label>
                                    <select class="form-control" name="id_admin">
                                        <?php
                                            foreach ($admin_insert as $data) {
                                                echo '
                                                <option value="'.$data->ID_ADMIN.'">'.$data->ID_ADMIN.'</option>
                                                ';
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>NAMA BUKU</label>
                                    <input class="form-control" placeholder="Enter text" name="nama_buku" value="<?php echo $edit_buku->NM_BUKU; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>PRODUSEN</label>
                                    <input class="form-control" placeholder="Enter text" name="produsen" value="<?php echo $edit_buku->PRODUSEN; ?>" required>
                                </div>

                                <label>HARGA</label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input type="text" class="form-control" name="harga" value="<?php echo $edit_buku->HARGA; ?>" required>
                                    <span class="input-group-addon">.00</span>
                                </div>

                                <div class="form-group">
                                    <label>JUMLAH STOK</label>
                                    <input class="form-control" placeholder="Enter text" name="jumlah_stok" value="<?php echo $edit_buku->JML_STOK; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>File input</label>
                                    <input type="file" name="foto" required>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                                <a href="<?php echo base_url();?>index.php/admin/lihat_data_buku" class="btn btn-primary">
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