<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Barang</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <?php 
            //notif form harus diisi
            echo validation_errors('<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-info"></i>','</h5></div>');
            
            if (isset($error_upload)) {
                echo'<div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-info"></i>', '$error_upload','</h5></div>';
            }
            
            echo form_open_multipart('barang/edit/'. $barang->id_barang) ?>
                <div class ="row">
            <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input name="nama_barang" class="form-control" placeholder="nama Barang" value="<?= $barang->nama_barang ?>">
                </div>

            </div>
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Harga</label>
                        <input name="harga" class="form-control" placeholder="Harga Barang" value=" <?= $barang->harga ?> ">
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Total Stok</label>
                        <input name="total_stok" class="form-control" placeholder="Stok Barang" value=" <?= $barang->total_stok ?> ">
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Stok Size S</label>
                        <input name="stok_s" class="form-control" placeholder="Stok Size S" value=" <?= $barang->stok_s ?> ">
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Stok Size M</label>
                        <input name="stok_m" class="form-control" placeholder="Stok Size M" value=" <?= $barang->stok_m ?> ">
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Stok Size L</label>
                        <input name="stok_l" class="form-control" placeholder="Stok Size L" value=" <?= $barang->stok_l ?> ">
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Stok Size XL</label>
                        <input name="stok_xl" class="form-control" placeholder="Stok Size XL" value=" <?= $barang->stok_xl ?> ">
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Berat (Gr)</gr></label>
                        <input type="number" min="0" name="berat" class="form-control" placeholder="Berat Dalam Satuan Gram" value="<?=
                                                                                                    $barang->berat ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="10" placeholder="Deskripsi Barang"><?= $barang->nama_barang ?> </textarea>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Gambar</label>
                        <input name="gambar" type="file" class="form_control" id="preview_gambar">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <img src="<?= base_url('assets/gambar/'. $barang->gambar ) ?>" width="300px" id="gambar_load">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <a href="<?= base_url('barang') ?>" class="btn btn-danger btn-sm">Kembali</a>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </div>

            <?php echo form_close() ?>


        </div>
    </div>
</div>

<script>
    function bacaGambar(input) {
        if (input.files && input.files[0] ) {
            var reader = new FileReader();
            reader.onload = function(e){
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#preview_gambar").change(function(){
        bacaGambar(this);
    })
</script>
