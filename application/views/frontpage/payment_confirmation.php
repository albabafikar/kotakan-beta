<section class="section single-wrap">
    <div class="container">
        <div class="page-title">
            <div class="row">
                <div class="col-sx-12 text-center">
                    <h3>Form Konfirmasi Pembayaran</h3>
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
                        <form class="form-horizontal" method="post" id="submit" action="<?= base_url() ?>do_action?method=confirm" enctype="multipart/form-data">
                            <div class="col-lg-12 col-md-12">
                                <?php if($this->session->flashdata('confirmInfo')): 
                                $info = $this->session->flashdata('confirmInfo'); ?>
                                <div class="alert alert-<?= $info['status']; ?>">
                                  <?= $info['message']; ?>
                                </div>
                                <?php endif; ?>
                                <!-- Data Konfirmasi -->
                                <div class="panel panel-info">
                                    <div class="panel-heading">Data Konfirmasi</div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-12"><label>No Pesanan:</label></div>
                                            <div class="col-md-12">
                                                <input type="text" name="no_pesanan" class="form-control" placeholder="Contoh: <?= generateNoOrder() ?>" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Nama Lengkap:<span style="color:#fc0505">&nbsp;*</span></label>
                                                <input type="text" name="nama_pemesan" class="form-control" placeholder="Contoh: Budi Sudarsono" autocomplete="off" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-xs-12">
                                                <label>Email:<span style="color:#fc0505">&nbsp;*</span></label>
                                                <input type="email" name="email_pemesan" class="form-control" placeholder="Contoh: budisudarsono@gmail.com" autocomplete="off" required />
                                            </div>
                                            <div class="span1"></div>
                                            <div class="col-md-6 col-xs-12">
                                                <label>No Handphone:<span style="color:#fc0505">&nbsp;*</span></label>
                                                <input type="text" name="nohp_pemesan" class="form-control" placeholder="Contoh: +628xxxxxxxxx" autocomplete="off" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12"><label>Upload Bukti:<span style="color:#fc0505">&nbsp;*</span></label></div>
                                            <div class="col-md-12">
                                                <input type="file" name="upload_bukti" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/* Data Konfirmasi */-->
                                
                                <hr>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <button type="submit" class="btn custombutton button--isi btn-primary">Konfirmasi Sekarang!</button>
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