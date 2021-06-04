<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Libary Q</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <a href="<?php echo base_url();?>index.php/admin/detil_transaksi" class="btn btn-success"><i class="fa fa-plus fa-fw"></i>Tambah Transaksi</a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">

                <?php
                    $notif = $this->session->flashdata('notif');

                    echo
                            '<div class="alert alert-danger>"'
                            .$notif.
                            '</div>'
                        ;
                ?>

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Transaksi</th>
                                <th>Id Admin</th>
                                <th>Nama Pembeli</th>
                                <th>Total</th>
                                <th>Tanggal Beli</th>
                                <td></td>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1; 
                                foreach($table_join as $data) {
                                    echo'
                                        <tr>
                                            <td>'.$no.'</td>
                                            <td>'.$data->KD_BUKU.'</td>
                                            <td>'.$data->KD_TRANSAKSI.'</td>
                                            <td>'.$data->NM_BUKU.'</td>
                                            <td>'.$data->JUMLAH.'</td>
                                            <td>'.$data->SUB_TOTAL.'</td>
                                            <td>'.$data->NM_PEMBELI.'</td>
                                            <td>
                                                <a href="'.base_url().'index.php/admin/edit_transaksi/'.$data->KD_BUKU.'" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i>Edit</a>
                                                <a href="'.base_url().'index.php/admin/delete_transaksi/'.$data->KD_BUKU.'" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>Hapus</a>
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