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
                  <?php if($this->session->flashdata('itemInfo')): $data = $this->session->userdata('itemInfo'); ?>
                  <div class="alert alert-<?= $data['condition'] ?> alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <!-- <strong>Holy guacamole!</strong> Best check yo self, you're not looking too good. -->
                    <?= $data['message'] ?>
                  </div>
                  <?php endif; ?>
                  <a href="<?= $this->adminSite ?>item?action=add" class="btn btn-success">Tambah Data</a>
                  <div class="x_content">
                    <?php if(count($list_barang) == 0): ?>
                    <h3 class="text-center">Data menu masih kosong!</h3>
                    <?php else: ?>
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama Menu</th>
                          <th>Kategori</th>
                          <th>Harga Satuan</th>
                          <th>Ditambahkan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php $no = 1; foreach($list_barang as $row): ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $row->nama_barang ?></td>
                          <td><?= $row->nama_kategori ?></td>
                          <td><?= toRupiah($row->harga_satuan) ?></td>
                          <td><?= date('d/m/Y H:i', strtotime($row->date_added)) ?></td>
                          <td class=""><div class="btn-group">
                          <a class="btn btn-sm btn-default" href="<?= $this->adminSite ?>item?action=detail&id=<?= $row->id ?>" title="Detail Data"><i class="fa fa-file-text-o"></i></a>
                          <!-- <?= $this->adminSite ?>item?action=edit&id=<?= $row->id ?> -->
                          <a class="btn btn-sm btn-default" href="#" title="Ubah Data"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-sm btn-default" href="<?= $this->adminSite ?>item?action=delete&id=<?= $row->id ?>" title="Hapus Data"><i class="fa fa-trash"></i></a></div></td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                    <div class="text-center"><?php echo $this->pagination->create_links(); ?></div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>  
              </div>
            </div>
          </div>