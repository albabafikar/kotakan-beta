        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Bukti Pembayaran</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel"> 
                  <?php if(!$detail_bukti): ?>
                  <div class="x_content">
                    <h3 class="text-center">Data Bukti Pembayaran tidak ditemukan!</h3>
                  </div>
                  <?php else: ?>
                  <div class="x_title">
                    <h2><a href="<?= $this->adminSite ?>bukti-pembayaran"><span class="fa fa-chevron-left"></span></a>&nbsp;Detail Bukti Pembayaran</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p>Nama Lengkap</p>
                    <h4><strong><?= $detail_bukti->nama ?></strong></h4>
                    <p>Email</p>
                    <h4><strong><?= $detail_bukti->email ?></strong></h4>
                    <p>No Handphone</p>
                    <h4><strong><?= $detail_bukti->no_hp ?></strong></h4>
                    <p>Bukti Pembayaran</p>
                    <img src="<?= $detail_bukti->gambar ?>" class="img-responsive" /><br/>
                    <p>Tanggal submit</p>
                    <h4><strong><?= date('d/m/Y H:i', strtotime($detail_bukti->date_added)) ?> 
                    (<?= timeAgo(strtotime($detail_bukti->date_added)) ?>)</strong></h4>
                  </div>
                  <?php endif; ?>
                </div>
              </div>  
              </div>
            </div>
          </div>