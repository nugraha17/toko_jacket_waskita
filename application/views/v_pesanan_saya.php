<div class="row">


    <div class="col-sm-12">
        <?php

        if ($this->session->flashdata('pesan')) {
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> ';
            echo $this->session->flashdata('pesan');
            echo '</h5> </div>';
        }

        ?>
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Proses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Dikirim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Selesai</a>
                    </li>
                </ul>
            </div>

            <!-- order -->
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                        <table class="table">
                            <tr>
                                <th>Informasi</th>
                                <th>No order</th>
                                <th>Tanggal</th>
                                <th>Expedisi</th>
                                <th>Total Bayar</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($belum_bayar as $key => $value) { ?>
                                <tr>
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
                                    <td>
                                        <b><?= $value->expedisi ?></b><br>
                                        Paket : <?= $value->paket ?><br>
                                        Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
                                    </td>
                                    <td>
                                        <b>Rp<?= number_format($value->total_bayar, 0) ?></b><br>
                                        <?php if ($value->status_bayar == 0) { ?>
                                            <span class="badge badge-warning">Belum Bayar</span>
                                        <?php } else { ?>
                                            <span class="badge badge-success">Sudah Bayar</span><br>
                                            <span class="badge badge-primary">Menunggu Verivikasi</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($value->status_bayar == 0) { ?>
                                            <a href="<?= base_url('pesanan_saya/bayar/' . $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-primary">Bayar</a>
                                        <?php } ?>


                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>

                    <!-- proses -->
                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                        <table class="table">
                            <tr>
                                <th>Informasi</th>
                                <th>No order</th>
                                <th>Tanggal</th>
                                <th>Expedisi</th>
                                <th>Total Bayar</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($diproses as $key => $value) { ?>
                                <tr>
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
                                    <td>
                                        <b><?= $value->expedisi ?></b><br>
                                        Paket : <?= $value->paket ?><br>
                                        Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
                                    </td>
                                    <td>
                                        <b>Rp<?= number_format($value->total_bayar, 0) ?></b><br>

                                        <span class="badge badge-success">Terverivikasi</span><br>
                                        <span class="badge badge-primary">Diproses/Dikemas</span>

                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>

                    <!-- dikirim & akan diterima -->
                    <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                        <table class="table">
                            <tr>
                                <th>Informasi</th>
                                <th>No order</th>
                                <th>Tanggal</th>
                                <th>Expedisi</th>
                                <th>Total Bayar</th>
                                <th>No Resi</th>
                            </tr>
                            <?php foreach ($dikirim as $key => $value) { ?>
                                <tr>
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
                                    <td>
                                        <b><?= $value->expedisi ?></b><br>
                                        Paket : <?= $value->paket ?><br>
                                        Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
                                    </td>
                                    <td>
                                        <b>Rp<?= number_format($value->total_bayar, 0) ?></b><br>
                                        <span class="badge badge-primary">Dikirim</span>

                                    </td>
                                    <td>
                                        <h4><?= $value->no_resi ?></h4>
                                        <button class="btn btn-success btn-xs btn-flat" data-toggle="modal" data-target="#diterima<?= $value->id_transaksi ?>">Diterima</button>
                                    </td>

                                </tr>
                            <?php } ?>
                        </table>
                    </div>

                    <!-- selesai -->
                    <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                        <table class="table">
                            <tr>
                                <th>Informasi</th>
                                <th>No order</th>
                                <th>Tanggal</th>
                                <th>Expedisi</th>
                                <th>Total Bayar</th>
                                <th>No Resi</th>
                            </tr>
                            <?php foreach ($selesai as $key => $value) { ?>
                                <tr>
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
                                    <td>
                                        <b><?= $value->expedisi ?></b><br>
                                        Paket : <?= $value->paket ?><br>
                                        Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
                                    </td>
                                    <td>
                                        <b>Rp<?= number_format($value->total_bayar, 0) ?></b><br>
                                        <span class="badge badge-primary">Selesai</span>

                                    </td>
                                    <td>
                                        <h4><?= $value->no_resi ?></h4>
                                    </td>

                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>


</div>

<!-- modal barang diterima -->
<?php foreach ($dikirim as $key => $value) { ?>
    <div class="modal fade" id="diterima<?= $value->id_transaksi ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pesanan Diterima</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Pesanan Sudah Diterima...?

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('pesanan_saya/diterima/' . $value->id_transaksi) ?>" class="btn btn-primary">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>