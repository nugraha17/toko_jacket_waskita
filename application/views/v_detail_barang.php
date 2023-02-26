<div class="card card-solid">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                <div class="col-12">
                    <img src="<?= base_url('assets/gambar/' . $barang->gambar) ?>" class="product-image" alt="Product Image">
                </div>
                <div class="col-12 product-image-thumbs">
                    <div class="product-image-thumb active"><img src="<?= base_url('assets/gambar/' . $barang->gambar) ?>" alt="Product Image"></div>
                    <?php foreach ($gambar as $key => $value) { ?>

                        <div class="product-image-thumb"><img src="<?= base_url('assets/gambarbarang/' . $value->gambar) ?>"></div>

                    <?php  } ?>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="my-3"><?= $barang->nama_barang ?></h3>
                <p><?= $barang->deskripsi ?></p>
                <hr>
                <div class="form-group">

                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0">
                            Rp. <?= number_format($barang->harga, 0) ?>
                        </h2>
                    </div>
                    <?php
                    echo form_open('belanja/add');
                    echo form_hidden('id', $barang->id_barang);
                    echo form_hidden('price', $barang->harga);
                    echo form_hidden('name', $barang->nama_barang);
                    echo form_hidden('redirect_page', str_replace('index.php,', '', current_url()));
                    ?>

                    <div class="mt-4 ">
                        <div class="row">
                            <h6>Qty : </h6>
                            <div class="col-sm-2">
                                <input type="number" name="qty" class="form-control" value="1" min="1">
                            </div>
                            <h6>Pilih Ukuran : </h6>
                            <div class="col-sm-2 ">
                                <select name="ukuran" class="form-control">
                                <?php if ($barang->stok_s > 0): ?>
                                    <option value="S">S</option>
                                <?php endif; ?>
                                <?php if ($barang->stok_m > 0): ?>
                                    <option value="M">M</option>
                                <?php endif; ?>
                                <?php if ($barang->stok_l > 0): ?>
                                    <option value="L">L</option>
                                <?php endif; ?>
                                <?php if ($barang->stok_xl > 0): ?>
                                    <option value="XL">XL</option>
                                <?php endif; ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary btn-flat swalDefaultSuccess">
                                    <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                    Add to Cart
                                </button>
                            </div>
                            <br>
                            <br>
                            <div>
                                <h4 class="badge badge-warning ">Stok Size S : <?= $barang->stok_s ?> | Stok Size M : <?= $barang->stok_m ?> | Stok Size L : <?= $barang->stok_l ?> | Stok Size XL : <?= $barang->stok_xl ?></h4>
                            </div><br />
                        </div>
						
                    </div>
                        <?php echo form_close() ?>
					    <?php if($this->session->flashdata('success')): ?>
						    <div class="alert alert-primary">
						    <?= $this->session->flashdata('success') ?>
						    </div>
					    <?php endif; ?>
					    <?php if($this->session->flashdata('error')): ?>
					    <div class="alert alert-danger">
						    <?= $this->session->flashdata('error') ?>
					</div>
					    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>template/dist/js/demo.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script type="text/javascript">
    </script>
	
