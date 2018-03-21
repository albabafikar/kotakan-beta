<section class="section single-wrap">
    <div class="container">
        <div class="page-title">
            <div class="row">
                <div class="col-sx-12 text-center">
                    <h3>Blog &amp; Promo</h3>
                    <div class="bread">
                        <ol class="breadcrumb">
                          <li><a href="#">Home</a></li>
                          <li class="active">Blog &amp; Promo</li>
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
                    <div class="page-content">
                        <div class="storelist bloglist panel panel-info">
                            <div class="panel-body">
                                <?php foreach($list_artikel as $data): ?>
                                <div class="form-group row wow fadeIn">
                                    <div class="col-sm-4 col-xs-12">
                                        <a href="<?= base_url().'blog/detail/'.$data->slug ?>"><img alt="" class="img-responsive img-thumbnail" src="<?= $data->gambar_utama ?>"></a>
                                    </div>
                                    <div class="col-sm-8 col-xs-12">
                                        <h4><a href="<?= base_url().'blog/detail/'.$data->slug ?>"><?= $data->judul ?></a></h4>
                                        <ul class="list-inline">
                                            <li><a href="#"><i class="fa fa-clock-o"></i> <?= date('d/m/Y H:i', strtotime($data->date_added)) ?></a></li>
                                            <li><a href="#"><i class="fa fa-user"></i> <?= $data->nama_author ?> </a></li>
                                        </ul>
                                        <p><?= substr(strip_tags($data->konten), 0, 200).'...'; ?></p>
                                    </div>
                                </div><!-- end form-group -->
                                <?php endforeach; ?>
                            </div><!-- end panel-body -->
                        </div><!-- end store-list -->
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end content -->

        <div class="content-after text-center boxs">
            <div class="row">
                <div class="col-md-12">
                    <?php echo $paging ?>
                </div>
            </div><!-- end row -->
        </div><!-- end content after -->

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