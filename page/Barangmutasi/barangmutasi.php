<div class="row mx-3 my-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Barang Mutasi</h4>
                    <?php if($_SESSION['level']=='admin'){?>
                                
                                
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">

                        <i class="fa fa-plus"></i>
                        Tambah Data
                       
                    </button>
                    <?php }?>
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
                                <form action='index.php?p=barangmutasipro' method="post">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Nama Barang</label>
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
                                                <label>Tanggal Mutasi</label>
                                                <input id="addName" type="date" name="tanggal_mutasi" class="form-control"
                                                    placeholder="fill name">
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
                                                <label>Lokasi Asal</label>
                                                <select class="form-control" name="lokasi_asal">
                                                    <option value="">--Lokasi Asal--</option>
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

                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Tanggal Mutasi</th>
                                <th>Lokasi Asal</th>
                                <th>Lokasi Tujuan</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>

                                <?php if($_SESSION['level']=='admin'){?>
                                <th style="width: 10%">Action</th>
                                <?php }?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            //  $sql = 'Select * from barang';
                             
                              $result = $db->query('SELECT *,barang_mutasi.keterangan,r.nama_ruangan as nama_r from barang_mutasi LEFT JOIN barang on barang_mutasi.kode_barang = barang.kode_barang
                              LEFT JOIN ruangan r on barang_mutasi.lokasi_asal = r.id
                              LEFT JOIN ruangan rr on barang_mutasi.lokasi_tujuan = rr.id
                              ');
                            $no=1;
                              while($data=mysqli_fetch_array($result)){
                                $id_mutasi = $data['id_mutasi'];
                              
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['kode_barang'];?></td>
                                <td><?= $data['nama_barang'];?></td>
                                <td><?=$data['tgl_mutasi'];?></td>
                                <td><?=$data['nama_ruangan'];?></td>
                                <td><?=$data['nama_r'];?></td>
                                <td><?= $data['jumlah'];?></td>
                                <td><?=$data['keterangan'];?></td>

                                <?php if($_SESSION['level']=='admin'){?>
                                <td>
                                    <div class="form-button-action">
                                        <button class="btn btn-link btn-primary btn-lg" data-toggle="modal"
                                            data-target="#edit-<?= $data['id_mutasi'];; ?>">
                                            <i class="fa fa-edit"></i>
                                            <!-- Tambah Data -->
                                        </button>
                                        <a href="index.php?p=mutasi_hapus&id=<?= $data['id_mutasi']; ?>"
                                            data-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                            data-original-title="Remove">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </td>
                                <?php }?>
                            </tr>

                        <div class="modal fade" id="edit-<?= $data['id_mutasi']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                            <form action='index.php?p=barangMutasi' method="post">
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
                                                        <label>Tanggal Mutasi</label>
                                                        <input id="addName" type="date" name="tgl_mutasi"
                                                            class="form-control" value="<?= $data['tgl_mutasi'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Lokasi Asal</label>
                                                            <select class="form-control" name="lokasi_asal">
                                                                <?php 
                                                                    $data_ruangan = $db->query('SELECT * FROM ruangan');
                                                                    foreach($data_ruangan as $item) :
                                                                ?>
                                                                    <option value="<?= $item['id'] ?>" <?= ($item['id'] == $data['lokasi_asal']) ? 'selected' : '' ?>>
                                                                        <?=$item['nama_ruangan']?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Lokasi Tujuan</label>
                                                            <select class="form-control" name="lokasi_tujuan">
                                                                <?php 
                                                                    foreach($data_ruangan as $item) :
                                                                ?>
                                                                    <option value="<?= $item['id'] ?>" <?= ($item['id'] == $data['lokasi_tujuan']) ? 'selected' : '' ?>>
                                                                        <?=$item['nama_ruangan']?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
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