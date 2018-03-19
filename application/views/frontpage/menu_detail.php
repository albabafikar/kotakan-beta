<section class="section single-wrap">
    <div class="container">
        <div class="page-title">
            <div class="row">
                <div class="col-sx-12 text-center">
                    <h3><?= $detail_menu->nama_barang ?></h3>
                </div>
            </div>
        </div>

        <div class="content-top">
            <div class="row">
                <div class="col-sm-12 col-xs-12 cen-xs text-right">
                    <div class="bread">
                        <ol class="breadcrumb">
                          <li><a href="<?= base_url() ?>">Home</a></li>
                          <li><a href="<?= base_url().'menu' ?>">Menu</a></li>
                          <li class="active">Snack Box</li>
                        </ol>
                    </div>
                </div>
            </div><!-- end row -->
        </div><!-- end content top -->

        <div class="row">
            <?php
            $categoryIcon = array(
                    1 => 'fa fa-cutlery',
                    2 => 'fa fa-archive',
                    3 => 'fa fa-coffee',
                    4 => 'fa fa-cutlery'
                );

            $categorySlug = array(
                    1 => 'nasikotak',
                    2 => 'snackbox',
                    3 => 'coffeebreak',
                    4 => 'katering'
                );
            ?>
            <div id="singlewrapper" class="col-md-8">
                <div class="content nopad">
                    <div class="item-single-wrapper">
                        <div class="item-box">
                            <div class="item-media text-center" style="margin: 15px;">
                                 <img alt="Sedang Loading..." class="img-responsive img-thumbnail" src="<?= $detail_menu->gambar ?>">  
                            </div><!-- end item-media -->
                            <?php if($detail_menu->keterangan): ?>
                            <div class="item-desc"> 
                              <?= $detail_menu->keterangan; ?>
                            </div><!-- end item-desc -->
                            <?php endif; ?>
                        </div><!-- end item-box -->
                    </div><!-- end item-single-wrapper -->
                </div><!-- end content -->

                <div class="content-after boxs">
                    <div class="row">
                        <div class="col-md-12 general-title">
                            <h4>Menu <strong><?= $detail_menu->nama_kategori ?></strong> Pilihan <span class="hidden-xs"><a href="<?= base_url().'menu/'.$categorySlug[$detail_menu->id_kategori] ?>">Lihat Semua</a></span></h4>
                            <hr>
                        </div><!-- end col -->
                    </div><!-- end row -->
                    <div class="row">
                        <?php if($similiar_menu->num_rows() > 0 ): ?>
                        <?php foreach($similiar_menu->result() as $data): ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="item-box">
                                <div class="item-media entry">
                                    <img src="<?= $data->gambar ?>" style="height: 200px" alt="" class="img-responsive" />
                                    <div class="magnifier">
                                        <div class="item-author">
                                            <a href="<?= base_url().'menu/'.$categorySlug[$data->id_kategori] ?>"><span class="<?php echo $categoryIcon[$data->id_kategori] ?>"></span>&nbsp; <?= $data->nama_kategori ?></a>
                                        </div>
                                    </div>
                                </div>
                                <h4><a href="<?= base_url().'menu/detail/'.$data->slug ?>"><?= $data->nama_barang ?></a></h4>
                                <small><?= toRupiah($data->harga_satuan) ?></small>
                            </div><!-- end item-box -->
                        </div><!-- end col -->
                        <?php endforeach; ?>
                        <?php else: ?>
                        <h3 class="text-center">Tidak ada data yang dipilih!</h3>
                        <?php endif; ?>
                    </div><!-- end row -->
                </div><!-- end content after -->
            </div><!-- end singlewrapper -->

            <div id="sidebar" class="col-md-4">
                <div class="boxes boxs">
                    <div class="item-price text-center">
                        <p><?= toRupiah($detail_menu->harga_satuan)?></p>
                        <em><a href="<?= base_url().'menu/'.$categorySlug[$detail_menu->id_kategori] ?>"><?= $detail_menu->nama_kategori ?></a></em>
                        <!-- <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div> -->
                        <hr>
                        <a href="<?= base_url().'order?form='.$categorySlug[$detail_menu->id_kategori].'&s='.urlEncoder($detail_menu->slug) ?>" class="btn btn-primary">Pesan Sekarang!</a>
                    </div><!-- end price -->
                </div><!-- end boxes -->
            </div><!-- end sidebar -->
        </div><!-- end row -->

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
