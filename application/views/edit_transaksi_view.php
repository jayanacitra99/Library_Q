
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form Edit Data Transaksi</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="row">
                        <div class="col-lg-6">

                            <form action="<?php echo base_url(); ?>index.php/admin/do_edit_transaksi/<?php echo $edit_transaksi->KD_TRANSAKSI;?>" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>KODE TRANSAKSI</label>
                                    <input class="form-control" placeholder="Enter text" name="kode_transaksi" value="<?php echo $edit_transaksi->KD_TRANSAKSI; ?>" readonly>
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
                                    <label>NAMA PEMBELI</label>
                                    <input class="form-control" placeholder="Enter text" name="nama_pembeli" value="<?php echo $edit_transaksi->NM_PEMBELI; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>TOTAL</label>
                                    <input class="form-control" placeholder="Enter text" name="total" value="<?php echo $edit_transaksi->TOTAL; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>TANGGAL BELI</label>
                                    <input class="form-control" placeholder="Enter text" name="tanggal_beli" value="<?php echo date('Y-m-D')?>" readonly>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                                <a href="<?php echo base_url();?>index.php/admin/data_transaksi" class="btn btn-primary">
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