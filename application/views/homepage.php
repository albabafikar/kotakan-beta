
<section class="section single-wrap">
    <div class="container">
        <div class="page-title public-profile-title">
            <div class="row">
                <div class="col-sx-12 text-left" style="color:#ffffff;padding-left: 20px;">
                    <h3>Indonesian Foodbox Marketplace</h3>
                    <h4 style="color:#ffffff;"> Butuh kotakan ? Ya ... @inikotakan !! </h4>
                  
                    <a style="color:#ffffff">Marketplace Foodbox "Kotakan" Konsumsi pertama di Indonesia yang menghubungkan produsen #TemanKotakan dengan customer / pemilik acara #MitraKotakan. </a>
                    </br>
                    </br>
                    <div class="col-xs-6 cen-xs text-left" style="padding-left: 0px; font-size: 20px;">
                            <ul class="list-inline social">
                                <li><a href="http://fb.com/inikotakan"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="http://instagram.com/inikotakan"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="https://api.whatsapp.com/send?phone=6282337576338&text=Halo%20Admin%20Saya%20Mau%20Order%20Kotakan"><i class="fa fa-whatsapp"></i></a></li>
                            </ul>
                            </br>
                            </br>
                            </br>
                    </div>
                </div>
            </div>
        </div>

        <!--div class="content-top">
            <div class="row">
                <div class="col-sm-12 col-xs-12 cen-xs text-left">
                    <ul class="list-inline social">
                        <li><h2 href="<?= @$this->facebook ?>" target="_blank"><i class="fa fa-facebook"></i></h2></li>
                        <li><h2 href="<?= @$this->instagram ?>" target="_blank"><i class="fa fa-instagram"></i></h2></li>
                        <li><h2 href="<?= @$this->whatsapp ?>" target="_blank"><i class="fa fa-whatsapp"></i></h2></li>
                    </ul>
                </div>
            </div><!-- end row -->
        </div><!-- end content top -->

      

        <!--div class="content-before">
            <div class="row">
                <div class="col-md-6 col-sx-12 cen-xs">
                    <form class="dropForm">
                        <div class="input-prepend">
                            <div class="btn-group">
                                <select name="orderby" class="selectpicker">
                                  <option>All Platforms</option>
                                  <option>IOS Apps</option>
                                  <option>Android Apps</option>
                                  <option>UI Kits</option>
                                  <option>Site Templates</option>
                                  <option>WordPress Themes</option>
                              </select>
                            </div>
                            <input type="text" class="form-control" placeholder="Search anything here.">
                            <button class="btn btn-primary" tabindex="-1"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 text-right hidden-xs">
                    <div class="catalog-order">
                        <select name="orderby" class="selectpicker">
                            <option value="popularity">Sort by Popularity</option>
                            <option value="rating">Sort by Average Rating</option>
                            <option value="date" selected='selected'>Sort by Newness</option>
                            <option value="price">Sort by Price: Low to High</option>
                            <option value="price-desc">Sort by Price: High to Low</option>
                        </select>
                    </div>
                </div>
            </div><-end row>
        </div><!-- end content before -->

        <div class="content-before">
            <div class="row">
                <div class="col-md-12 col-sx-12 cen-xs">
                    <form class="dropForm" method="get">
                        <div class="input-prepend">
                            <?php
                            $string = array('Nasi Kotak', 'Snack Box', 'Katering', 'Coffee Break');
                            $rand = array_rand($string);
                            ?>
                            <div class="btn-group">
                                <select name="category" class="selectpicker">
                                  <option value="all">Semua</option>
                                  <?php foreach($string as $str): ?>
                                  <option value="<?= strtolower(str_replace(' ', '', $str)) ?>"><?= $str ?></option>
                                  <?php endforeach; ?>
                              </select>
                            </div>
                            <div class="btn-group">
                                <select name="price" class="selectpicker">
                                  <option value="lowest">Harga Terendah</option>
                                  <option value="highest">Harga Tertinggi</option>
                              </select>
                            </div>
                            <input type="text" name="q" class="form-control" placeholder="Saya mau cari..." autocomplete="off" />
                            <button class="btn btn-primary" tabindex="-1"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div><!-- end row -->
        </div><!-- end content before -->

        <div class="content">
            <div class="row">
                <div class="col-md-12 general-title">
                    <h4>Pilihan Menu Kotakan<span class="hidden-xs"><a href="<?= base_url().'menu' ?>">Lihat Semua Menu</a></span></h4>
                    <hr>
                </div><!-- end col -->
            </div><!-- end row -->
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
                foreach($list_menu as $data): ?>
                <div class="col-md-2.5 col-sm-3">
                    <div class="item-box">
                        <div class="item-media entry">
                            <img src="<?= $data->gambar ?>" style="height: 100%" alt="" class="img-responsive" />
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
            </div>
        </div>

        </br>
        

          <div class="item-media text-center">
            <div id="slider" class="flexslider clearfix">
                <ul class="slides">
                    <li><img src="<?= base_url() ?>resources/images/konten-01.png" alt="" class="img-responsive"></li>
                    <li><img src="<?= base_url() ?>resources/images/konten-02.png" alt="" class="img-responsive"></li>
                    <li><img src="<?= base_url() ?>resources/images/konten-03.png" alt="" class="img-responsive"></li>
                </ul>
            </div>
        </div><!-- end item-media -->
        
        </br>
        <div class="refer-messages">
            <div class="row text-center">
                <div class="col-md-3">
                    <div class="boxes boxs">
                        <i class="fa fa-cutlery"></i>
                        <h3>Paket </br>Nasi Kotak</h3>
                        <p>Kami menjual nasi kotak mulai dari yang sederhana dan murah sampai yang Istimewa sesuai kebutuhan anda.</p>
                        <a href="<?= base_url().'menu/nasikotak' ?>" class="btn btn-primary">Pilih Menu</a>
                    </div>
                </div><!-- end col -->

                <div class="col-md-3">
                    <div class="boxes boxs">
                        <i class="fa fa-archive"></i>
                        <h3>Paket </br>Snack Box</h3>
                        <p>Kami menyediakan snack box murah untuk acara sederhana anda seperti arisan, pkk dan acara lainnya. </p>
                        <a href="<?= base_url() ?>order?form=snackbox" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div><!-- end col -->
                <div class="col-md-3">
                    <div class="boxes boxs">
                        <i class="fa fa-coffee"></i>
                        <h3>Paket Coffee Break</h3>
                        <p>Kami menyajikan berbagai macam minuman dan snack prasmanan (coffee break) untuk kegiatan anda.</p> </br>
                        <a href="<?= base_url() ?>order?form=coffeebreak" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div><!-- end col -->
                <div class="col-md-3" style="padding-right: 0px;">
                    <div class="boxes boxs">
                        <i class="fa fa-cutlery"></i>
                        <h3>Paket Katering Prasmanan</h3>
                        <p>Kami menawarkan menu prasmanan dengan berbagai macam paket sesuai dengan kebutuhan event anda. </p>
                        <a href="<?= base_url() ?>order?form=katering" class="btn btn-primary">Pilih Paket</a>
                    </div>
                </div><!-- end col -->

            </div><!-- end row -->
        </div><!-- end refer-messages -->



        <div class="stores boxs">
            <div class="row">
                <div class="col-md-12 general-title">
                    <h4>Promo &amp; Info Terbaru <span class="hidden-xs"><a href="<?= base_url() ?>blog" title="Blog &amp; Promo">View all</a></span></h4>
                    <hr>
                </div><!-- end col -->
            </div><!-- end row -->
            
            <div class="row homefeatured">
                <div class="col-md-12">
                    <div class="storelist panel panel-info">
                        <div class="panel-body">
                            <div class="form-group row">
                                <div class="col-sm-4 col-xs-12">
                                    <img alt="" class="img-responsive img-thumbnail" src="<?= base_url() ?>resources/images/promo.jpg">
                                </div>
                                <div class="col-sm-8 col-xs-12">
                                    <h4><a href="public-profile.html">Promo Gratis Ongkir Sampai 30 April 2018</a></h4>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-envelope-o"></i> Yuk masukkan kode promo dalam form pesanan kotakan anda !</a></li>
                                    
                                        <li><a href="single-item.html"><i class="fa fa-shopping-cart"></i> Minimal Pemesanan 100 Kotakan all item</a></li>
                                        <li><i class="fa fa-map-marker"></i> Area Malang Raya</li>
                                    </ul>
                                </div>
                                <!--div class="col-md-5 col-xs-12">
                                   <ul class="list-inline">
                                        <li><a href="single-item.html" class="screenshot" data-gal="<?= base_url() ?>resources/upload//item_01.jpg" title="This is an item title <span>$12.00</span>"><img class="img-responsive img-thumbnail" src="<?= base_url() ?>resources/upload//item_01.jpg" alt=""></a></li>
                                        <li><a href="single-item.html" class="screenshot" data-gal="<?= base_url() ?>resources/upload//item_02.jpg" title="This is an item title <span>$12.00</span>"><img class="img-responsive img-thumbnail" src="<?= base_url() ?>resources/upload//item_02.jpg" alt=""></a></li>
                                        <li><a href="single-item.html" class="screenshot" data-gal="<?= base_url() ?>resources/upload//item_03.jpg" title="This is an item title <span>$12.00</span>"><img class="img-responsive img-thumbnail" src="<?= base_url() ?>resources/upload//item_03.jpg" alt=""></a></li>
                                        <li><a href="single-item.html" class="screenshot" data-gal="<?= base_url() ?>resources/upload//item_04.jpg" title="This is an item title <span>$12.00</span>"><img class="img-responsive img-thumbnail" src="<?= base_url() ?>resources/upload//item_04.jpg" alt=""></a></li>
                                        <li><a href="single-item.html" class="screenshot" data-gal="<?= base_url() ?>resources/upload//item_05.jpg" title="This is an item title <span>$12.00</span>"><img class="img-responsive img-thumbnail" src="<?= base_url() ?>resources/upload//item_05.jpg" alt=""></a></li>
                                    </ul>
                                </div><!-- end col -->
                                <div class="col-sm-4 col-xs-12 text-center">
                                    <ul>
                                        <li><center><a href="#" class="btn btn-primary btn-block">Kode Promo : #PROMOKOTAKAN</a></center></li>
                                        
                                    </ul>
                                </div>
                            </div><!-- end form-group -->   
                        </div>
                    </div>
                </div><!-- end col -->
            </div><!-- end r0w -->
        </div><!-- end stores -->

   
      
        <div class="content-message boxs">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <h2>Lebih dari 50 Partner produk kotakan telah berkolaborasi bersama .. <br>Sekarang saatnya anda bergabung dengan kami...</h2>
                    <a href="http://bit.ly/temankotakan" class="btn btn-default btn-lg">Daftar Jadi Partner Kotakan</a>
                </div>
            </div><!-- end row -->
        </div><!-- end content message -->
    </div><!-- end container -->
</section>

