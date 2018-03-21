<section class="section single-wrap">
    <div class="container">
        <div class="content-top">
            <div class="row">
                <div class="col-sm-12 col-xs-12 cen-xs text-right">
                    <div class="bread">
                        <ol class="breadcrumb">
                          <li><a href="<?= base_url() ?>">Home</a></li>
                          <li><a href="<?= base_url().'blog' ?>">Blog</a></li>
                          <li class="active"><?= $artikel->judul ?></li>
                        </ol>
                    </div>
                </div>
            </div><!-- end row -->
        </div><!-- end content top -->

        <div class="content boxs">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="page-content">
                        <div class="storelist bloglist singlepost panel panel-info">
                            <div class="panel-body">
                                <div class="form-group wow fadeIn">
                                    <img alt="Sedang Loading..." class="img-responsive img-thumbnail" src="<?= $artikel->gambar_utama ?>">
                                    
                                    <div class="singleposttitle">
                                    <h4><?= $artikel->judul ?></h4>
                                    </div>

                                    <div class="postmeta">
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="fa fa-clock-o"></i> <?= date('d/m/Y H:is', strtotime($artikel->date_added)) ?></a></li>
                                        <li><a href="#"><i class="fa fa-user"></i> <?= $artikel->nama_author ?></a></li>
                                    </ul>
                                    </div>

                                    <div class="post-content">
                                        <?= $artikel->konten ?>
                                    </div><!-- end post -->

                                </div><!-- end form-group -->       
                            </div><!-- end panel-body -->
                        </div><!-- end store-list -->
                    </div><!-- end page-content -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end content -->

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