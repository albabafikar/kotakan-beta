        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Contact</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel"> 
                  <?php if(!$detail_contact): ?>
                  <div class="x_content">
                    <h3 class="text-center">Data Contact tidak ditemukan!</h3>
                  </div>
                  <?php else: ?>
                  <div class="x_title">
                    <h2><a href="<?= $this->adminSite ?>contact"><span class="fa fa-chevron-left"></span></a>&nbsp;Detail Contact</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p>Nama Lengkap</p>
                    <h4><strong><?= $detail_contact->nama ?></strong></h4>
                    <p>Email</p>
                    <h4><strong><?= $detail_contact->email ?></strong></h4>
                    <p>No Handphone</p>
                    <h4><strong><?= $detail_contact->no_hp ?></strong></h4>
                    <p>Pesan</p>
                    <h4><strong><?= $detail_contact->message ?></strong></h4>
                    <p>Tanggal submit</p>
                    <h4><strong><?= date('d/m/Y H:i', strtotime($detail_contact->date_submitted)) ?> 
                    (<?= timeAgo(strtotime($detail_contact->date_submitted)) ?>)</strong></h4>
                  </div>
                  <?php endif; ?>
                </div>
              </div>  
              </div>
            </div>
          </div>