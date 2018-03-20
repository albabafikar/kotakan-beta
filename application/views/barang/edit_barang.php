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
          <h4 class="text-center">Data Menu tidak ditemukan!</h4>
          <?php else: ?>
          <div class="x_title">
            <h2><a href="<?= $this->adminSite ?>item"><span class="fa fa-chevron-left"></span></a>&nbsp;Form Ubah Barang<small>Catatan: Kosongkan apabila tidak ingi diubah.</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form class="form-horizontal form-label-left" method="post" novalidate action="<?= $this->adminSite ?>do_action?method=edit_barang" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $detail_barang->id ?>">
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Barang
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="" class="form-control col-md-7 col-xs-12" name="nama_barang" type="text" autocomplete="off" />
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kategori
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="kategori" class="form-control" onchange="isHaveSubKategori(this.value)">
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Harga Satuan
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="" class="form-control col-md-7 col-xs-12" name="harga_satuan" type="text" autocomplete="off" />
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Gambar
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" name="gambar" id="imgUpload" /><br/>
                  <img id="imgPreview" src="#" alt="Image Preview" width="55%" height="50%" />
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label">Keterangan:</label>
                <div id="alerts"></div>
                <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">
                  <div class="btn-group">
                    <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                    <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                    <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                    <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                  </div>

                  <div class="btn-group">
                    <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                    <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                    <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                    <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                  </div>

                  <div class="btn-group">
                    <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                    <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                    <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                    <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                  </div>

                  <div class="btn-group">
                    <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                    <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                  </div>
                </div>

                <div id="editor-one" class="editor-wrapper"></div>

                <textarea name="keterangan" id="keterangan" style="display:none;"></textarea>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                  <button id="saveBtn" type="submit" class="btn btn-success">Ubah</button>
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