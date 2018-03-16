        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Kontak</h3>
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
                          <th>Nama</th>
                          <th>Email</th>
                          <th>No HP</th>
                          <th>Pesan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php $no = 1; foreach($list_contact as $row): ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $row->nama ?></td>
                          <td><?= $row->email ?></td>
                          <td><?= $row->no_hp ?></td>
                          <td><?= substr($row->message, 0, 100) ?></td>
                          <td><div class="btn-group">
                          <a class="btn btn-sm btn-default" href="<?= $this->adminSite ?>contact?action=detail&id=<?= $row->id ?>" title="Detail Data"><i class="fa fa-file-text-o"></i></a>
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