<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="assets/slider/slider5.jpg">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="assets/slider/slider6.jpg">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="assets/slider/slider7.jpg">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="assets/slider/slider8.jpg">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row">

            <?php foreach ($barang as $key => $value) { ?>

                <div class="col-sm-4">
                    <?php
                    
                    echo form_open('belanja/add');
                    echo form_hidden('id', $value->id_barang);
                    echo form_hidden('qty', 1);
                    echo form_hidden('price', $value->harga);
                    echo form_hidden('name', $value->nama_barang);
                    echo form_hidden('redirect_page', str_replace('index.php,','',current_url()));
        
                    ?>
                    <div class="card bg-light">
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-12 text-center">
                                <a href="<?= base_url('home/detail_barang/' . $value->id_barang) ?>" >
                                <img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" width="300px" height="300px">
                                        </a>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="txt-left">
                                        Rp <?= number_format($value->harga, 0) ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-right">
                                        <a href="<?= base_url('home/detail_barang/' . $value->id_barang) ?>" class="btn btn-sm btn-primary ">
                                            <h7>Detail</h7> 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>

            <?php } ?>

        </div>
    </div>
</div>

<!-- SweetAlert2 -->
<script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript">
    $(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $('.swalDefaultSuccess').click(function() {
            Toast.fire({
                icon: 'success',
                title: 'Data Berhasil DItambah Di Keranjang.'
            })
        });
    });
</script>
