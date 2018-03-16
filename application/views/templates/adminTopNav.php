        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?= base_url() ?>img.jpg" alt=""><?= @$this->userdata->nama ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?= $this->adminSite ?>logout"><i class="fa fa-sign-out pull-right"></i> Keluar</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-send"></i>
                    <span class="badge bg-green"><?= $list_order->num_rows() ?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <?php foreach($list_order->result() as $row): ?>
                    <li>
                      <a href="<?= $this->adminSite ?>order?action=detail&id=<?= $row->id ?>">
                        <span>
                          <span><?= $row->nama_pemesan ?></span>
                          <span class="time"><?= timeAgo(strtotime($row->date_added)) ?></span>
                        </span>
                        <span class="message">
                          <?= $row->keterangan ? $row->keterangan : '<strong><i>Tidak ada keterangan.</i></strong>' ?>
                        </span>
                      </a>
                    </li>
                    <?php endforeach; ?>
                    <li>
                      <div class="text-center">
                        <a href="<?= $this->adminSite ?>order">
                          <strong>Lihat semua pesanan</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->