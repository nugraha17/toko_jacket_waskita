<div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-cart"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Transaksi Belum Bayar</span>
            <span class="info-box-number">
                <?= $pesanan_masuk_notif ?>
            </span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>

<div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-newspaper"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Transaksi Di Proses</span>
            <span class="info-box-number"><?= $pesanan_proses ?></span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>
<!-- /.col -->

<div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-paper-plane"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Transaksi Di Kirim</span>
            <span class="info-box-number"><?= $pesanan_kirim ?></span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>

<div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Transaksi Selesai</span>
            <span class="info-box-number"><?= $pesanan_selesai ?></span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>
<!-- /.col -->



<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
        <div class="inner">
            <h3><?= $total_barang ?></h3>

            <p>Barang</p>
        </div>
        <div class="icon">
            <i class="fas fa-cube"></i>
        </div>
        <a href="<?= base_url('barang') ?>" class="small-box-footer">Info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>