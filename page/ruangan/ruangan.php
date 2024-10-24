<div class="row mx-3 my-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Ruangan</h4>
                    <?php if($_SESSION['level']=='admin'){?>
                                
                                
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">

                        <i class="fa fa-plus"></i>
                        Tambah Ruangan
                       
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
                                        Ruangan
                                    </span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="index.php?p=ruangan_proses" method="POST">   
                                <div class="row">
                                        <div class="col-sm-12">

                                            <div class="form-group form-group-default">
                                                <label>Ruangan</label>
                                                <input id="addName" type="text" name="nama_ruangan" class="form-control"
                                                    placeholder="Nama Ruangan">
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

                                <th>Ruangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            //  $sql = 'Select * from ruangan';
                             
                              $result = $db->query('Select * from ruangan');
                            $no=1;
                              while($data=mysqli_fetch_array($result)){
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['nama_ruangan']?></td>
                            </tr>
                            <div class="modal fade" id="edit-<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                            <form action='index.php?p=ruangan' method="post">
                                                <div class="row">
                                                    
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Ruangan</label>
                                                            <input id="addName" type="text" name="Ruangan"
                                                                class="form-control" value="<?= $data['Ruangan'] ?>">
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