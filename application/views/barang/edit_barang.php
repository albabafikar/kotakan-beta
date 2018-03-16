<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Ubah Barang</h3>
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <?php if(!$detail_barang): ?>
          <h1 class="text-center">Data Barang tidak ditemukan!</h1>
          <?php else: ?>
          <div class="x_title">
            <h2><a href="<?= $this->adminSite ?>item"><span class="fa fa-chevron-left"></span></a>&nbsp;Form Ubah Barang</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form class="form-horizontal form-label-left" method="post" novalidate action="<?= $this->adminSite ?>do_action?method=add_barang" enctype="multipart/form-data">
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Barang <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="" class="form-control col-md-7 col-xs-12" name="nama_barang" required="required" type="text" autocomplete="off" />
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kategori <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="kategori" class="form-control" required onchange="isHaveSubKategori(this.value)">
                    <option value="" disabled selected>--Pilih Kategori--</option>
                    <?php foreach($list_kategori as $row): ?>
                    <option value="<?= $row->id ?>"><?= $row->nama ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="item form-group" id="subkategori">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sub Kategori <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="subkategori" class="form-control" required>
                    <option value="" disabled selected>--Pilih Sub Kategori--</option>
                    <?php foreach($list_subkategori as $row): ?>
                    <option value="<?= $row->id ?>"><?= $row->nama ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Harga Satuan <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="" class="form-control col-md-7 col-xs-12" name="harga_satuan"  required="required" type="text" autocomplete="off" />
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Gambar <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" name="gambar" required/>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <button id="send" type="submit" class="btn btn-success">Ubah</button>
                </div>
              </div>
            </form>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>