<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Library Q</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <a href="<?php echo base_url();?>index.php/admin/tambah_buku_baru" class="btn btn-success"><i class="fa fa-plus fa-fw"></i>Tambah Buku Baru</a>

                    <a href="<?php echo base_url();?>index.php/admin/lihat_stok_buku" class="btn btn-success"><i class="fa fa-plus fa-fw"></i>Tambah Stok Buku</a>

                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Buku</th>
                                <th>Kode Supplier</th>
                                <th>Nama Buku</th>
                                <th>Produsen</th>
                                <th>Foto</th>
                                <th>Jumlah Stok</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1; 
                                foreach ($buku as $data) {
                                    echo'
                                        <tr>
                                            <td>'.$no.'</td>
                                            <td>'.$data->KD_BUKU.'</td>
                                            <td>'.$data->KD_SUPPLIER.'</td>
                                            <td>'.$data->NM_BUKU.'</td>
                                            <td>'.$data->PRODUSEN.'</td>
                                            <td><img width="100px" src="'.base_url().'uploads/'.$data->FOTO.'"></td>
                                            <td>'.$data->JML_STOK.'</td>
                                            <td>'.$data->HARGA.'</td>
                                            <td>
                                                <a href="'.base_url().'index.php/admin/edit_buku/'.$data->KD_BUKU.'" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i>Edit</a>
                                                <a href="'.base_url().'index.php/admin/delete_buku/'.$data->KD_BUKU.'" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Hapus</a>
                                            </td>
                                        </tr>';
                                    $no++;
                            }
                        ?>
                            
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->