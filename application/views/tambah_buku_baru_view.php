
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form Penambahan Buku Baru</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="row">
                        <div class="col-lg-6">

                            <form action="<?php echo base_url();?>index.php/admin/do_insert_buku_baru" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>KODE BUKU</label>
                                    <input class="form-control" placeholder="Enter text" name="kode_buku" required>
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
                                    <input class="form-control" placeholder="Enter text" name="nama_buku" required>
                                </div>

                                <div class="form-group">
                                    <label>PRODUSEN</label>
                                    <input class="form-control" placeholder="Enter text" name="produsen" required>
                                </div>

                                <label>HARGA</label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input type="text" class="form-control" name="harga" required>
                                    <span class="input-group-addon">.00</span>
                                </div>

                                <div class="form-group">
                                    <label>JUMLAH STOK</label>
                                    <input class="form-control" placeholder="Enter text" name="jumlah_stok" required>
                                </div>

                                <div class="form-group">
                                    <label>File input</label>
                                    <input type="file" name="foto" required>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                                <input type="reset" class="btn btn-default" value="Reset">
                            </form>

                        </div>
                        <!-- /.col-lg-12 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                       
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->