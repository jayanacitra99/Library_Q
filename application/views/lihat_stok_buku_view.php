<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Library Q</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <br>
            <div class="row">
                <div class="col-lg-12">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Buku</th>
                                <th>Nama Buku</th>
                                <th>Foto</th>
                                <th>Jumlah Stok</th>
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
                                            <td>'.$data->NM_BUKU.'</td>
                                            <td><img width="100px" src="'.base_url().'uploads/'.$data->FOTO.'"></td>
                                            <td>'.$data->JML_STOK.'</td>
                                            <td>
                                                <a href="'.base_url().'index.php/admin/tambah_stok/'.$data->KD_BUKU.'" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i>TAMBAH STOK</a>
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