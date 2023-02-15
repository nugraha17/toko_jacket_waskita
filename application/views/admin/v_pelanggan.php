<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Pelanggan</h3>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">


            <table class="table table-bordered" id="example1">
                <thead>
                    <tr class="text-center">
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Pelanggan
                        </th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Password</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($pelanggan as $key => $value) { ?>
                        <tr class="text-center">
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= $value->nama_pelanggan ?></td>
                            <td class="text-center"><?= $value->email ?></td>
                            <td class="text-center"><?= $value->password ?></td>
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value->id_pelanggan ?>"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_pelanggan ?>"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<!-- modal delete -->
<?php foreach ($pelanggan as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_pelanggan ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $value->nama_pelanggan ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h5>Apakah anda yakin ingin menghapus data ini !!</h5>

                </div>
                <div class="modal-footer justify-content-between">
                    <a href="<?= base_url('pelanggan/delete/' . $value->id_pelanggan)?>" class="btn btn-danger">Delete</a>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
 <!-- /.modal-edit -->
<?php foreach ($pelanggan as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value->id_pelanggan ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Pelanggan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <?php
                    echo form_open('pelanggan/edit/' . $value->id_pelanggan);
                    ?>

                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" value="<?= $value->nama_pelanggan ?>" class="form-control" placeholder="Nama Pelanggan" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value=" <?= $value->email ?>" class="form-control" placeholder="Email" required>
                    </div>

                    <div class="form-group">
                        <label>Pssword</label>
                        <input type="text" name="password" value=" <?= $value->password ?>" class="form-control" placeholder="password" required>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

                <?php
                echo form_close();
                ?>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>