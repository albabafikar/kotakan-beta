        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Artikel</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <?php if(!$detail_artikel): ?>
                  <div class="x_content">
                    <h3 class="text-center">Data Artikel tidak ditemukan!</h3>
                  </div>
                  <?php else: ?>
                  <div class="x_title">
                    <h2><a href="<?= $this->adminSite ?>artikel"><span class="fa fa-chevron-left"></span></a>&nbsp;Detail Artikel</h2>
                    <h2 class="pull-right">Lihat Artikel&nbsp;<a href="<?= base_url().'artikel/detail/'.$detail_artikel->slug ?>"><span class="fa fa-chevron-right"></span></a></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p>Judul</p>
                    <h4><?= $detail_artikel->judul ?></h4>
                    <p>Author</p>
                    <h4><?= $detail_artikel->nama_author ?></h4>     
                    <p>Dilihat</p>
                    <h4><?= (int) $detail_artikel->dilihat ?> kali</h4>               
                    <p>Gambar Utama</p>
                    <img src="<?= $detail_artikel->gambar_utama ?>" alt="image artikel" width="30%" height="20%"/><br/>
                    <p>Ditambahkan</p>
                    <h4><?= date('d/m/Y H:i', strtotime($detail_artikel->date_added)); ?></h4>
                  </div>
                  <?php endif; ?>
                </div>
              </div>  
              </div>
            </div>
          </div>