        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Kategori</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <a href="#" class="btn btn-success">Tambah Data</a>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama Kategori</th>
                          <th>Ditambahkan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php $no = 1; foreach($list_kategori as $row): ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $row->nama ?></td>
                          <td><?= date('d/m/Y H:i', strtotime($row->date_added)); ?></td>
                          <td class=""><div class="btn-group">
                          <a class="btn btn-sm btn-default" href="#" title="Detail Data"><i class="fa fa-file-text-o"></i></a>
                          <a class="btn btn-sm btn-default" href="#" title="Ubah Data"><i class="fa fa-pencil"></i></a>
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