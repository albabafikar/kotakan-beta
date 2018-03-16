        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Pesanan</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>No Pesanan</th>
                          <th>Nama Pemesan</th>
                          <th>Tanggal Kirim</th>
                          <th>Alamat Penerima</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php $no = 1; foreach($list_pesanan as $row): ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $row->no_pesanan ?></td>
                          <td><?= $row->nama_pemesan ?></td>
                          <td><?= date('d/m/Y', strtotime($row->tanggal_kirim)) ?></td>
                          <td><?= $row->alamat_penerima ?></td>
                          <td><?= $row->dilihat ? 'Sudah Dilihat' : 'Belum Dilihat'; ?></td>
                          <td><div class="btn-group">
                          <a class="btn btn-sm btn-default" href="<?= $this->adminSite ?>order?action=detail&id=<?= $row->id ?>" title="Detail Data"><i class="fa fa-file-text-o"></i></a>
                          <a class="btn btn-sm btn-default" href="#" title="Hapus Data"><i class="fa fa-trash"></i></a></div></td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>  
              </div>
            </div>
          </div>