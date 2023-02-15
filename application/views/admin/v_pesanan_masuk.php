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
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Pesanan Masuk</a>
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
        <div class="card-body">

            <!-- Pesanan Masuk -->
            <div class="tab-content" id="custom-tabs-four-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                    <table class="table">
                        <tr>
                            <th>Informasi Barang</th>
                            <th>No order</th>
                            <th>Tanggal</th>
                            <th>Expedisi</th>
                            <th>Informasi Penerima</th>
                            <th>Total Bayar</th>
                        </tr>
                        <?php foreach ($pesanan as $key => $value) { ?>
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
                                    Nama Penerima : <?= $value->nama_penerima ?><br>
                                    Nomer Handphone : <?= $value->hp_penerima ?><br>
                                    Alamat : <?= $value->alamat ?> <br>
                                    Kota : <?= $value->kota ?> <br>
                                    Provinsi : <?= $value->provinsi ?> <br>
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
                                    <?php if ($value->status_bayar == 1) { ?>
                                        <button class="btn btn-sm btn-success btn-flat" data-toggle="modal" data-target="#cek<?= $value->id_transaksi ?>">Cek Bukti Bayar</button>
                                        <a href="<?= base_url('admin/proses/' . $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-primary">Proses</a>
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
                            <th>Informasi Barang</th>
                            <th>No order</th>
                            <th>Tanggal</th>
                            <th>Expedisi</th>
                            <th>Informasi Penerima</th>
                            <th>Total Bayar</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($pesanan_diproses as $key => $value) { ?>
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
                                    Nama Penerima : <?= $value->nama_penerima ?><br>
                                    Nomer Handphone : <?= $value->hp_penerima ?><br>
                                    Alamat : <?= $value->alamat ?> <br>
                                    Kota : <?= $value->kota ?> <br>
                                    Provinsi : <?= $value->provinsi ?> <br>
                                </td>
                                <td>
                                    <b>Rp<?= number_format($value->total_bayar, 0) ?></b><br>
                                    <?php if ($value->status_bayar == 0) { ?>
                                        <span class="badge badge-warning">Belum Bayar</span>
                                    <?php } else { ?>
                                        <span class="badge badge-primary">Diproses/Dikemas</span><br>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($value->status_bayar == 1) { ?>
                                        <button class="btn btn-sm btn-flat btn-success" data-toggle="modal" data-target="#kirim<?= $value->id_transaksi ?>"><i class="fa fa-paper-plane"></i> Kirim</button>
                                    <?php } ?>


                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>

                <!-- dikirim -->
                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                    <table class="table">
                        <tr>
                            <th>Informasi Barang</th>
                            <th>No order</th>
                            <th>Tanggal</th>
                            <th>Expedisi</th>
                            <th>Informasi Penerima</th>
                            <th>Total Bayar</th>
                            <th>No Resi</th>
                        </tr>
                        <?php foreach ($pesanan_dikirim as $key => $value) { ?>
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
                                    Nama Penerima : <?= $value->nama_penerima ?><br>
                                    Nomer Handphone : <?= $value->hp_penerima ?><br>
                                    Alamat : <?= $value->alamat ?> <br>
                                    Kota : <?= $value->kota ?> <br>
                                    Provinsi : <?= $value->provinsi ?> <br>
                                </td>
                                <td>
                                    <b>Rp<?= number_format($value->total_bayar, 0) ?></b><br>
                                    <?php if ($value->status_bayar == 0) { ?>
                                        <span class="badge badge-warning">Belum Bayar</span>
                                    <?php } else { ?>
                                        <span class="badge badge-primary">Dikirim</span><br>
                                    <?php } ?>
                                </td>
                                <td> <?= $value->no_resi ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>

                <!-- Pesanan Masuk Selesai -->
                <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                    <table class="table">
                        <tr>
                            <th>Informasi Barang</th>
                            <th>No order</th>
                            <th>Tanggal</th>
                            <th>Expedisi</th>
                            <th>Total Bayar</th>
                            <th>No Resi</th>
                        </tr>
                        <?php foreach ($pesanan_selesai as $key => $value) { ?>
                            <tr>
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

                                    <span class="badge badge-primary">Diterima/Selesai</span>

                                </td>
                                <td> <?= $value->no_resi ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>

<!-- modal cek bukti bayar -->
<?php foreach ($pesanan as $key => $value) { ?>
    <div class="modal fade" id="cek<?= $value->id_transaksi ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->no_order ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>Nama Bank</th>
                            <th>:</th>
                            <td><?= $value->nama_bank ?></td>
                        </tr>
                        <tr>
                            <th>No Rekening</th>
                            <th>:</th>
                            <td><?= $value->no_rek ?></td>
                        </tr>
                        <tr>
                            <th>Atas Nama</th>
                            <th>:</th>
                            <td><?= $value->atas_nama ?></td>
                        </tr>
                        <tr>
                            <th>Total Bayar</th>
                            <th>:</th>
                            <td>Rp. <?= number_format($value->total_bayar, 0) ?></td>
                        </tr>
                    </table>
                    <img class="img-fluid pad" src="<?= base_url('assets/bukti_bayar/') . $value->bukti_bayar ?>" alt="">
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>

<!-- modal dikirim-->
<?php foreach ($pesanan_diproses as $key => $value) { ?>
    <div class="modal fade" id="kirim<?= $value->id_transaksi ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->no_order ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <?php echo form_open('admin/kirim/' . $value->id_transaksi) ?>
                    <table class="table">
                        <tr>
                            <th>Expedisi</th>
                            <th>:</th>
                            <td><?= $value->expedisi ?></td>
                        </tr>
                        <tr>
                            <th>Paket</th>
                            <th>:</th>
                            <td><?= $value->paket ?></td>
                        </tr>
                        <tr>
                            <th>Ongkir</th>
                            <th>:</th>
                            <td>Rp. <?= number_format($value->ongkir, 0) ?></td>
                        </tr>
                        <tr>
                            <th>Nomer Resi</th>
                            <th>:</th>
                            <td><input name="no_resi" class="form-control" placeholder="No Resi"></td>
                        </tr>
                    </table>
                    <div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                    <?php echo form_close() ?>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>