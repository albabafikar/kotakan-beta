<section class="section single-wrap">
    <div class="container">
        <?php
        $changeLabel = array(
            'nasikotak' => 'Nasi Kotak',
            'snackbox' => 'Snack Box',
            'katering' => 'Katering Prasmanan',
            'coffeebreak' => 'Coffee Break'
          );
        ?>
        <div class="page-title public-profile-title">
            <div class="row">
                <!-- <div class="col-sx-12 text-center">
                    <h3>Pilihan Menu <?= $changeLabel[$label] ?></h3>
                    <div class="bread">
                        <ol class="breadcrumb">
                          <li><a href="<?= base_url() ?>">Home</a></li>
                          <li class="active">Kategori Menu</li>
                        </ol>
                    </div>
                </div> -->
              <div class="col-sx-12 text-center">
                <img src="<?= base_url() ?>resources/images/avatar.jpg" alt="" class="img-circle">
                  <h3>Pilihan Menu <span style="color: #ded2d2;"><?= $changeLabel[$label] ?></span></h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus cursus, tellus vel ullamcorper fermentum, <br/>velit nibh molestie velit, vitae feugiat leo lorem eget tellus. Nam vehicula cursus fermentum.</p>
                  <ul class="list-inline social">
                      <li><a href="<?= @$this->facebook ?>"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="<?= @$this->instagram ?>"><i class="fa fa-instagram"></i></a></li>
                      <li><a href="<?= @$this->whatsapp ?>"><i class="fa fa-whatsapp"></i></a></li>
                  </ul>
              </div>
            </div>
        </div>

        <div class="content-before">
            <div class="row">
                <div class="col-md-12 col-sx-12 cen-xs">
                    <form class="dropForm" method="get">
                        <div class="input-prepend">
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
              <div class="col-md-3 col-sm-6">
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
            </div><!-- end row -->
        </div><!-- end content -->

        <div class="content-after text-center boxs">
            <div class="row">
                <div class="col-md-12">
                    <?php echo $paging ?>
                    <!--
                    <nav class="pagination-wrapper">
                        <ul class="pagination">
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    -->
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