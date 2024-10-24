<div class="row mx-3 my-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Barang Masuk</h4>
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        Tambah Data
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
                                        Tambah</span>
                                    <span class="fw-light">
                                        Data
                                    </span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="small">Create a new row using this form, make sure you fill them all</p>
                                <form action='index.php?p=barangMasuk_proses' method="post">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
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
                                                <label>Tanggal Barang Masuk</label>
                                                <input id="addName" type="date" name="tanggal_transaksi"
                                                    class="form-control" placeholder="fill name">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Jumlah</label>
                                                <input id="addName" type="number" name="jumlah" class="form-control"
                                                    placeholder="fill name">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Lokasi Tujuan</label>
                                                <select class="form-control" name="lokasi_tujuan">
                                                    <option value="">--Lokasi Tujuan--</option>
                                                    <?php 
                                                        $data =  $db->query('SELECT * FROM  ruangan');
                                                        foreach($data as $item) :
                                                    ?>
                                                    <option value="<?= $item['id'] ?>">
                                                        <?=$item['nama_ruangan']?></option>
                                                    <?php 
                                                        endforeach;
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Keterangan</label>
                                                <input id="addName" type="text" name="keterangan" class="form-control"
                                                    placeholder="fill name">
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
                <!-- <div><a href="./cetak/cetakbarangmasuk.php" class="btn btn-danger mb-2">Cetak</a></div> -->
                <!-- <button class="btn btn-danger btn-sm ml-auto mb-2" data-toggle="modal" data-target="#cetak">
                        <i class="fa fa-plus"></i>
                        Cetak
                    </button> -->

                <!-- Modal -->
                <div class="modal fade" id="cetak" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header no-bd">
                                <h5 class="modal-title">
                                  <--  <span class="fw-mediumbold">
                                        CETAK</span>
                                    <!-- <span class="fw-light">
                                        Data
                                    </span> -->
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action='./cetak/cetakbarangmasuk.php' method="post">
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <label>Bulan</label>
                                            <div class="form-group form-group-default">
                                                <input id="addName" type="month" name="bulan"
                                                    class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer no-bd">
                                        <button type="submit" name="cetak" class="btn btn-primary">Cetak</button>
                                        
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
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Tanggal masuk</th>
                                <th>Lokasi Tujuan</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php 
                            //  $sql = 'Select * from barang';
                             
                              $result = $db->query('Select *,barang_masuk.keterangan from barang_masuk LEFT JOIN barang as b ON barang_masuk.kode_barang=b.kode_barang');
                            $no=1;
                              while($data=mysqli_fetch_array($result)){
                                // var_dump($data)
                              
                ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['kode_barang']?></td>
                                <td><?= $data['nama_barang']?></td>
                                <td><?=$data['tanggal_masuk']?></td>
                                <td><?=$data['lokasi_tujuan']?></td>
                                <td><?=$data['jumlah']?></td>
                                <td><?=$data['keterangan']?></td>


                                <td>
                                    <div class="form-button-action">
                                        <button class="btn btn-link btn-primary btn-lg" data-toggle="modal"
                                            data-target="#edit-<?= $data['id_masuk'] ?>">
                                            <i class="fa fa-edit"></i>
                                            <!-- Tambah Data -->
                                        </button>
                                        <a href="index.php?p=barangMasuk_hapus&id=<?= $data['id_masuk'] ?>"
                                            data-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                            data-original-title="Remove">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade" id="edit-<?= $data['id_masuk'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold">
                                                    Edit</span>
                                                <span class="fw-light">
                                                    Data
                                                </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action='index.php?p=barang_proses' method="post">
                                                <div class="row">
                                                    
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Kode Barang</label>
                                                            <input id="addName" type="text" name="kode_barang"
                                                                class="form-control" value="<?= $data['kode_barang'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Nama Barang</label>
                                                            <input id="addName" type="text" name="nama_barang"
                                                                class="form-control" value="<?= $data['nama_barang'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                        <label>Tanggal Masuk</label>
                                                        <input id="addName" type="date" name="tanggal_transaksi"
                                                            class="form-control" value="<?= $data['tanggal_masuk'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Lokasi Tujuan</label>
                                                            <input id="addName" type="text" name="lokasi_tujuan"
                                                                class="form-control" value="<?= $data['lokasi_tujuan'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Jumlah</label>
                                                            <input id="addName" type="number" name="jumlah"
                                                                class="form-control" value="<?= $data['jumlah'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Keterangan</label>
                                                            <input id="addName" type="text" name="keterangan"
                                                                class="form-control" value="<?= $data['keterangan'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer no-bd">
                                                    <button type="submit" name="edit"
                                                        class="btn btn-primary">Add</button>
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>  
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