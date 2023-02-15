<div class="col-12">
    <!-- Main content -->
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h4>
                    <i class="fas fa-globe"></i> AdminLTE, Inc.
                    <small class="float-right">Bulan: <?= $bulan ?> | Tahun: <?= $tahun ?></small>
                </h4>
            </div>
            <!-- /.col -->
        </div>

        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Informasi</th>
                            <th>No Order</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        $grand_total = 0;
                         foreach ($laporan as $key => $value) {
                            $grand_total = $grand_total + $value->grand_total; ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <?php
                                $details = $this->db
                                    ->join('tbl_barang', 'tbl_barang.id_barang=tbl_rinci_transaksi.id_barang')
                                    ->get_where('tbl_rinci_transaksi', ['no_order' => $value->no_order])->result_array();
                                // var_dump($details);
                                ?>
                                <td>
                                    <?php foreach ($details as $d) : ?>
                                        <p>Barang : <?= $d['nama_barang'] ?></p>
                                        <p>Jumlah : <?= $d['qty'] ?></p>
                                        <p>Ukuran : <?= $d['ukuran'] ?></p>
                                        <hr>
                                    <?php endforeach; ?>
                                </td>
                                <td><?= $value->no_order ?></td>
                                <td><?= $value->tgl_order ?></td>
                                <td>Rp. <?= number_format($value->grand_total, 0) ?></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
                <h1>Grand Total = Rp. <?= number_format($grand_total, 0) ?> </h1>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-12">
                <button class="btn btn-default" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
            </div>
        </div>
    </div>
    <!-- /.invoice -->
</div><!-- /.col -->