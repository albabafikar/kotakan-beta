        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Menu</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <?php if(!$detail_barang): ?>
                  <div class="x_content">
                    <h3 class="text-center">Data Menu tidak ditemukan!</h3>
                  </div>
                  <?php else: ?>
                	<div class="x_title">
				            <h2><a href="<?= $this->adminSite ?>item"><span class="fa fa-chevron-left"></span></a>&nbsp;Detail Menu</h2>
				            <div class="clearfix"></div>
				          </div>
                  <div class="x_content">
                    <p>Nama Menu</p>
                    <h4><strong><?= $detail_barang->nama_barang ?></strong></h4>
                    <p id="kategori">Kategori</p>
                    <h4 id="kategoriValue" data-kategori="<?= $detail_barang->id_kategori ?>"><strong><?= $detail_barang->nama_kategori ?></strong></h4>
                    <div id="subkategori">
                    	<p>Sub Kategori</p>
                    	<h4 id="subkategoriValue"></h4>
                    </div>
                    <p>Gambar</p>
                    <img src="<?= $detail_barang->gambar ?>" alt="placeholder+image" width="30%" height="20%"/><br/>
                    <p>Ditambahkan</p>
                    <h4><strong><?= date('d/m/Y H:i', strtotime($detail_barang->date_added)); ?></strong></h4>
                  </div>
                  <?php endif; ?>
                </div>
              </div>  
              </div>
            </div>
          </div>