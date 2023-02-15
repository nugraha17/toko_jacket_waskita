<div class="row">
    <div class="col-sm-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Upload Butkti Pembayaran</h3>
            </div>

            <div class="card-body">
                <p>silahkan transfer uang ke rekening di bawah ini sebesar :
                <h1 class="tetx-primary">
                    Rp. <?= number_format($pesanan->total_bayar, 0) ?>.-
                </h1>
                </p><br>
                <table class="table">
                    <tr>
                        <th>Bank</th>
                        <th>No Rekening</th>
                        <th>Atas Nama</th>
                    </tr>
                    <?php foreach ($rekening as $key => $value) { ?>
                        <tr>
                            <td><?= $value->nama_bank ?></td>
                            <td><?= $value->no_rek ?></td>
                            <td><?= $value->atas_nama ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-6">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Upload Butkti Pembayaran</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php echo form_open_multipart('pesanan_saya/bayar/'. $pesanan->id_transaksi) ?>
            <div class="card-body">
                <div class="form-group">
                    <label>Atas Namas</label>
                    <input name="atas_nama" class="form-control" placeholder="Atas Nama">
                </div>
                <div class="form-group">
                    <label>Nama Bank</label>
                    <input name="nama_bank" class="form-control" placeholder="Nama Bank">
                </div>
                <div class="form-group">
                    <label>No Rekening</label>
                    <input name="no_rek" class="form-control" placeholder="No Rekening">
                </div>
                <div class="form-group">
                    <label>Bukti Bayar</label>
                    <input type="file" name="bukti_bayar" class="form-control" required>
                </div>
            </div>

            <div class="card-footer">
                <a href="<?= base_url('pesanan_saya') ?>"class="btn btn-success">Kembali</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            
            <?php echo form_close() ?>
        </div>

    </div>
    <div class="col-sm-3"></div>
</div>