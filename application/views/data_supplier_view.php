<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">LIBRARY Q</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <a href="<?php echo base_url();?>index.php/admin/tambah_data_supplier" class="btn btn-success"><i class="fa fa-plus fa-fw"></i>Tambah Supplier Buku</a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Supplier</th>
                                <th>Nama Supplier</th>
                                <th>Alamat</th>
                                <th>Kota</th>
                                <th>No Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1; 
                                foreach ($supplier as $data) {
                                    echo'
                                        <tr>
                                            <td>'.$no.'</td>
                                            <td>'.$data->KD_SUPPLIER.'</td>
                                            <td>'.$data->NM_SUPPLIER.'</td>
                                            <td>'.$data->ALAMAT.'</td>
                                            <td>'.$data->KOTA.'</td>
                                            <td>+62'.$data->TELP.'</td>
                                            <td>
                                                <a href="'.base_url().'index.php/admin/edit_supplier/'.$data->KD_SUPPLIER.'" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i>Edit</a>
                                                <a href="'.base_url().'index.php/admin/delete_supplier/'.$data->KD_SUPPLIER.'" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Hapus</a>
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