
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form Penambahan Supplier Buku Baru</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="row">
                        <div class="col-lg-6">

                            <form action="<?php echo base_url();?>index.php/admin/do_insert_supplier_baru" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>KODE SUPPLIER</label>
                                    <input class="form-control" placeholder="Enter text" name="kode_supplier" required>
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
                                    <label>NAMA SUPPLIER</label>
                                    <input class="form-control" placeholder="Enter text" name="nama_supplier" required>
                                </div>

                                <div class="form-group">
                                    <label>ALAMAT</label>
                                    <input class="form-control" placeholder="Enter text" name="alamat" required>
                                </div>

                                <div class="form-group">
                                    <label>KOTA</label>
                                    <input class="form-control" placeholder="Enter text" name="kota" required>
                                </div>

                                <label>NO TELEPON</label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">+62</span>
                                    <input type="text" class="form-control" placeholder="Username" name="telepon" required>
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