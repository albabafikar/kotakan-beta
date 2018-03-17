 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><a href="<?= $this->adminSite ?>order"><span class="fa fa-chevron-left"></span></a>&nbsp;Detail Pemesanan</h2>
                    <?php if($dataOrder->status != 3): ?>
                    <button class="pull-right btn btn-info" title="Klik apabila orderan telah dibayar." onclick="acceptOrder()">Konfirmasi Order</button>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <section class="content invoice">
                      <!-- title row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h1>
                              <i class="fa fa-send"></i> No Order: <?= $dataOrder->no_pesanan ?>
                              <small class="pull-right">Tanggal Pesanan: <?= date('d/m/Y H:i', strtotime($dataOrder->date_added)) ?></small>
                          </h1>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->

                      <!-- Data Pribadi -->
                      <div class="row">
                        <div class="col-xs-12">
                          <h3>Data Pemesan</h3>
                          <div class="clearfix"></div>
                          <h6>Nama</h6>
                          <h4><?= $dataOrder->nama_pemesan ?></h4>
                          <h6>Nomor Handphone</h6>
                          <h4><?= $dataOrder->nomor_pemesan ?></h4>
                          <h6>Email</h6>
                          <h4><?= $dataOrder->email ?></h4>
                          <h6>Alamat</h6>
                          <h4><?= $dataOrder->alamat_pemesan ?></h4>
                        </div>
                      </div>
                      <hr/>
                      <!-- Data Pengiriman -->
                      <div class="row">
                        <div class="col-xs-12">
                          <h3>Data Pengiriman</h3>
                          <div class="clearfix"></div>
                          <h6>Alamat Pengiriman</h6>
                          <h4><?= $dataOrder->alamat_penerima ?></h4>
                          <h6>Nomor Handphone</h6>
                          <h4><?= $dataOrder->nomor_penerima ?></h4>
                          <h6>Tanggal Kirim</h6>
                          <h4><?= date('d/m/Y H:i', strtotime($dataOrder->tanggal_kirim)) ?></h4>
                        </div>
                      </div>
                      <hr/>
                      <!-- Data Pesanan -->
                      <div class="row">
                        <div class="col-xs-12 table">
                          <h3>Data Pesanan</h3>
                          <h6>Keterangan</h6>
                          <h4><?= $dataOrder->keterangan ? $dataOrder->keterangan : '<strong><i>Tidak ada keterangan.</i></strong>' ?></h4>
                          <h6>List Menu</h6>
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Nama Menu</th>
                                <th>Kategori</th>
                                <th>Harga Satuan</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach($dataMenu as $row): ?>
                              <tr>
                                <td><?= $row->nama_barang ?></td>
                                <td><?= $row->nama_kategori ?></td>
                                <td><?= toRupiah($row->harga_satuan) ?></td>
                              </tr>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>

                      <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-6 pull-right">
                          <div class="table-responsive">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <th>Total:</th>
                                  <td><?= toRupiah($dataOrder->total_biaya) ?></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Konfirmasi Order -->
          <div class="modal fade" id="modalform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
           <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Form Konfirmasi</h4>
                </div>
                  <div class="modal-body">
                    <input type="hidden" name="__id" id="__id" value="<?= $dataOrder->id ?>">
                    <h4>Orderan ini sudah dibayar?</h4>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Belum</button>
                    <button type="submit" class="btn btn-info" id="accept">Ya, sudah</button>
                  </div>
                </form>
              </div>
           </div>
          </div>
          <!-- /.Konfirmasi Order-->
        </div>
        <!-- /page content -->