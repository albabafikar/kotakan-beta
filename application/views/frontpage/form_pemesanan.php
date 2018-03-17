<section class="section single-wrap">
    <div class="container">
        <div class="page-title">
            <div class="row">
                <div class="col-sx-12 text-center">
                    <h3>Form Pemesanan <?= ucwords(@$this->input->get('form')) ?></h3>
                    <div class="bread">
                        <ol class="breadcrumb">
                          <li><a href="#">Home</a></li>
                          <li class="active">Pemesanan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-top">
            <div class="row">
                <div class="col-sm-12 col-xs-12 cen-xs text-right">
                    <ul class="list-inline social">
                        <li><a href="<?= @$this->facebook ?>"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="<?= @$this->instagram ?>"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="<?= @$this->whatsapp ?>"><i class="fa fa-whatsapp"></i></a></li>
                    </ul>
                </div>
            </div><!-- end row -->
        </div><!-- end content top -->

        <div class="content boxs">
            <div class="row">
                <div class="col-md-12 col-sm-12">

                    <div class="row cart-body">
                        <form class="form-horizontal" method="post" id="submit" action="<?= base_url() ?>do_action?method=new_order">
                            <div class="col-lg-12 col-md-12">
                                <!-- Data Pemesan -->
                                <div class="panel panel-info">
                                    <div class="panel-heading">Data Pemesan</div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Nama Lengkap:<span style="color:#fc0505">&nbsp;*</span></label>
                                                <input type="text" name="nama_pemesan" class="form-control" placeholder="Contoh: Budi Sudarsono" autocomplete="off" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-xs-12">
                                                <label>Email:<span style="color:#fc0505">&nbsp;*</span></label>
                                                <input type="email" name="email_pemesan" class="form-control" placeholder="Contoh: budisudarsono@gmail.com" autocomplete="off" required />
                                            </div>
                                            <div class="span1"></div>
                                            <div class="col-md-6 col-xs-12">
                                                <label>No Handphone:<span style="color:#fc0505">&nbsp;*</span></label>
                                                <input type="text" name="nohp_pemesan" class="form-control" placeholder="Contoh: 08xxxxxxxxx" autocomplete="off" required maxlength="20" onkeydown="return numericOnly(event)" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12"><label>Alamat:<span style="color:#fc0505">&nbsp;*</span></label></div>
                                            <div class="col-md-12">
                                                <textarea class="form-control" name="alamat_pemesan" style="resize: none; height: 150px;" placeholder="Contoh: Jl. Raya Malang No 16" required /></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/* Data Pribadi */-->

                                <!-- Data Order -->
                                <div class="panel panel-info">
                                    <div class="panel-heading">Data Order</div>
                                    <div class="panel-body">

                                        <!-- Form Nasi Kotak -->
                                        <?php if($kategori === 'nasikotak'): $dataMenu = $selected_menu;  ?>
                                        <div class="form-group">
                                          <div class="col-md-12 col-xs-12">
                                              <label>Nama Menu:</label>
                                              <label><big><?= $dataMenu->nama ?></big></label>
                                          </div>
                                          <input type="hidden" name="items[]" value="<?= $dataMenu->id ?>">
                                          <div class="col-md-12 col-xs-12">
                                              <label>Harga:</label>
                                              <label><big><?= toRupiah($dataMenu->harga_satuan) ?></big></label>
                                          </div>
                                          <div class="col-md-12 col-xs-12">
                                              <label>Foto:</label>
                                              <img src="<?= $dataMenu->gambar ?>" alt="Sedang Loading..." class="img-responsive">
                                          </div>
                                        </div>
                                        <?php else: ?>
                                        <!-- Form Snack, Coffee, Catering -->
                                        <div class="form-group" id="listItem">
                                            <!-- <div class="checkbox">
                                              <label><input type="checkbox" value="">Menu 1 - Rp9.000 <a href="#">detail menu</a></label>
                                            </div>
                                            <div class="checkbox">
                                              <label><input type="checkbox" value="">Menu 2 - Rp7.500 <a href="#">detail menu</a></label>
                                            </div> -->
                                            <?php 
                                            foreach($select_menu as $data): 
                                            $checked = (@$selected_menu->id == $data->id) ? ' checked' : null;
                                            ?>
                                            <div class="checkbox">
                                              <label><input type="checkbox"<?= $checked ?> name="items[]" value="<?= $data->id ?>" id="items"><?= $data->nama.' - '.toRupiah($data->harga_satuan) ?> <a href="javascript:void(0)" onclick="alert('popup detail menu')">detail menu</a></label>
                                            </div>
                                            <?php endforeach;?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!--/* Data Order */-->

                                <!-- Data Pengiriman -->
                                <div class="panel panel-info">
                                    <div class="panel-heading">Data Pengiriman</div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-6 col-xs-12">
                                                <label>Tanggal Kirim:<span style="color:#fc0505">&nbsp;*</span></label>
                                                <input type="text" class="datepicker form-control" placeholder="Pilih tanggal pengiriman" name="tanggal_kirim" required autocomplete="off" />
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <label>Jam Kirim:<span style="color:#fc0505">&nbsp;*</span></label>
                                                <input type="text" class="form-control" placeholder="Contoh: <?= rand(1,12) ?>" name="jam_kirim" autocomplete="off" required maxlength="2" onkeydown="return numericOnly(event)" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12"><label>Alamat Kirim:<span style="color:#fc0505">&nbsp;*</span></label></div>
                                            <div class="col-md-12">
                                                <textarea class="form-control" style="resize: none; height: 150px;" placeholder="Contoh: Jl. Raya Malang No 16" name="alamat_kirim" required /></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12"><label>No Penerima:<span style="color:#fc0505">&nbsp;*</span></label></div>
                                            <div class="col-md-12">
                                                <input type="text" name="nohp_penerima" class="form-control" placeholder="Contoh: 08xxxxxxxxx" autocomplete="off" required maxlength="20" onkeydown="return numericOnly(event)"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12"><label>Keterangan:</label></div>
                                            <div class="col-md-12">
                                                <?php
                                                $strings = array(
                                                        'Berapa lama pengirimannya?',
                                                        'Mohon konfirmasi secepatnya.',
                                                        'Saya butuh pesanan ini cepat'
                                                    );
                                                $randomString = array_rand($strings);
                                                ?>
                                                <textarea class="form-control" style="resize: none; height: 150px;" placeholder="Contoh: <?= $strings[$randomString] ?>" name="keterangan"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/* Data Pengiriman */-->
                                
                                <hr>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <button type="submit" class="btn custombutton button--isi btn-primary">Pesan Sekarang!</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end content -->

        <br>

        <div class="content-message boxs">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <h2>Lebih dari 50 Partner produk kotakan telah berkolaborasi bersama .. <br>Sekarang saatnya anda bergabung dengan kami...</h2>
                    <a href="<?= $this->kotakanPartner ?>" class="btn btn-default btn-lg">Daftar Jadi Partner Kotakan</a>
                </div>
            </div><!-- end row -->
        </div><!-- end content message -->
    </div><!-- end container -->
</section>