<div class="row mx-3 my-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Peminjaman</h4>
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        Peminjaman Barang
                    </button>
                 
                </div>
            </div>
            <div class="card-body">
                <!-- Modal -->
                <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header no-bd">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">
                                        Peminjaman Barang</span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="small">Create a new row using this form, make sure you fill them all</p>
                                <form action='index.php?p=pinjam_proses' method="post">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Nama_Barang</label>
                                                <select class="form-control" name="kode_barang">
                                                    <option value="">--Barang--</option>
                                                    <?php 
                                                        $data =  $db->query('SELECT * FROM  barang');
                                                        foreach($data as $item) :
                                                    ?>
                                                    <option value="<?= $item['kode_barang'] ?>">
                                                        <?=$item['nama_barang']?></option>
                                                    <?php 
                                                        endforeach;
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Tanggal Peminjaman</label>
                                                <input id="addName" type="date" name="tgl_pinjam"
                                                    class="form-control" placeholder="fill name">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Tanggal Pengembalian</label>
                                                <input id="addName" type="date" name="tgl_kembali"
                                                    class="form-control" placeholder="fill name">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Jumlah Pinjam</label>
                                                <input id="addName" type="number" name="jumlah"
                                                    class="form-control" placeholder="fill name">
                                            </div>
                                        </div>
                                         
                                        
                                    </div>
                                    <div class="modal-footer no-bd">
                                        <button type="submit" name="tambah" class="btn btn-primary">Add</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kode Barang</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Jumlah Pinjam</th>
                                <th>Status</th>
                                <?php if($_SESSION['level']=='admin'){?>
                                <th style="width: 10%">Action</th>
                                <?php }?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            //  $sql = 'Select * from barang';
                             
                            $result = $db->query("SELECT * FROM peminjam 
                            LEFT JOIN barang ON peminjam.kode_barang = barang.kode_barang 
                            LEFT JOIN user ON peminjam.id_user = user.id");
                                    $no=1;
                              while($data=mysqli_fetch_array($result)){
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?=$data['nama_barang']?></td>
                                <td><?=$data['kode_barang']?></td>
                                <td><?=$data['tgl_pinjam']?></td>
                                <td><?=$data['tgl_kembali']?></td>
                                <td><?=$data['jumlah']?></td>
                                <td><?=$data['status']?></td>
                                <?php if($_SESSION['level']=='admin'){?>
                                <td>
                                        <a href="index.php?p=pinjam_hapus&kembali=<?=$data['id_peminjam']?>"
                                            data-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                            data-original-title="Dikembalikan">
                                            Dikembalikan
                                        </a>
                                    </div>
                                </td>
                                <?php }?>
                            </tr>

                            
                            <?php 
                              }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>