<section class="section single-wrap">
    <div class="container">
        <div class="page-title">
            <div class="row">
                <div class="col-sx-12 text-center">
                    <h3>Form Konfirmasi</h3>
                    <div class="bread">
                        <ol class="breadcrumb">
                          <li><a href="#">Home</a></li>
                          <li class="active">Konfirmasi Pembayaran</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-top">
            <div class="row">
                <div class="col-sm-12 col-xs-12 cen-xs text-right">
                    <ul class="list-inline social">
                        <li><a href="<?= @$this->facebook ?>"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="<?= @$this->instagram ?>"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="<?= @$this->whatsapp ?>"><i class="fa fa-whatsapp"></i></a></li>
                    </ul>
                </div>
            </div><!-- end row -->
        </div><!-- end content top -->

        <div class="content boxs">
            <div class="row">
                <div class="col-md-12 col-sm-12">

                    <div class="row cart-body">
                        <form class="form-horizontal" id="submit" method="post" action="<?= base_url() ?>do_action?method=accept_order">
                            <div class="col-lg-12 col-md-12">
                                <!-- Data Pemesanan -->
                                <div class="panel panel-info">
                                    <div class="panel-heading">Data Pemesanan</div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>No Order:</label>
                                                <label><big><?= $data_pesanan->no_pesanan ?></big></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Data Pembelian -->
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        Data Pembelian
                                    </div>
                                    <div class="panel-body">
                                        <?php foreach($data_menu as $data): ?>
                                        <div class="form-group">
                                            <div class="col-sm-3 col-xs-3">
                                                <a href="single-item.html" class="screenshot" data-gal="<?= $data->gambar ?>" title="This is an item title <span>$12.00</span>"><img class="img-responsive img-thumbnail" src="<?= $data->gambar ?>" alt=""></a>
                                            </div>
                                            <div class="col-sm-4 col-xs-6">
                                                <div class="col-xs-12"><h4><?= $data->nama ?></h4></div>
                                            </div>
                                            <div class="col-sm-2 col-xs-3 text-right">
                                                <h6><?= toRupiah($data->harga_satuan) ?></h6>
                                            </div>
                                        </div>
                                        <div class="form-group"><hr /></div>
                                        <?php endforeach; ?>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Total Pembayaran:</label>
                                                <label><big><?= toRupiah($data_pesanan->total_biaya) ?></big></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Data Pembayaran -->
                                <div class="panel panel-info">
                                    <div class="panel-heading">Informasi Pembayaran</div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label>Pembayaran bisa dilakukan melalui bank: <strong>BRI, BNI dan Mandiri</strong></label>
                                            </div>
                                        </div>
                                        <?php
                                        $dataRekening = array(
                                            0 => array(
                                                'nama_bank' => 'BANK BRI',
                                                'no_rekening' => '629101000906502',
                                                'atas_nama' => 'M. ZIAELFIKAR ALBABA'
                                              ),
                                            1 => array(
                                                'nama_bank' => 'BANK BNI',
                                                'no_rekening' => '0619706504',
                                                'atas_nama' => 'M. ZIAELFIKAR ALBABA'
                                              ),
                                            2 => array(
                                                'nama_bank' => 'BANK MANDIRI',
                                                'no_rekening' => '1440016774256',
                                                'atas_nama' => 'M. ZIAELFIKAR ALBABA'
                                              )
                                          );
                                        foreach($dataRekening as $informasi):
                                        ?>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Rekening <strong><?= $informasi['nama_bank'] ?></strong>:</label>
                                                <label><big><?= $informasi['no_rekening'] ?> a/n <?= $informasi['atas_nama'] ?></big></label>
                                            </div>
                                        </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <input type="hidden" name="__e" value="<?= $data_pemesan->email ?>">
                                <input type="hidden" name="__n" value="<?= $data_pesanan->no_pesanan ?>">

                                <hr>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <p><strong>Dengan melakukan konfirmasi disini anda telah melakukan pemesanan sebenar-benarnya dan pihak kotakan.id akan menghubungi anda segera untuk proses selanjutnya</strong></p>
                                        <div class="checkbox">
                                          <label><input type="checkbox" id="agree">Ya, Saya setuju</label>
                                        </div>
                                        <button type="submit" class="btn custombutton button--isi btn-primary">Konfirmasi</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end content -->

        <br>

        <div class="content-message boxs">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <h2>Lebih dari 50 Partner produk kotakan telah berkolaborasi bersama .. <br>Sekarang saatnya anda bergabung dengan kami...</h2>
                    <a href="<?= $this->kotakanPartner ?>" class="btn btn-default btn-lg">Daftar Jadi Partner Kotakan</a>
                </div>
            </div><!-- end row -->
        </div><!-- end content message -->
    </div><!-- end container -->
</section>