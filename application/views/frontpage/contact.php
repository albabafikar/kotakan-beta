<section class="section single-wrap">
    <div class="container">
        <div class="page-title">
            <div class="row">
                <div class="col-sx-12 text-center">
                    <h3>Kontak Kami</h3>
                    <div class="bread">
                        <ol class="breadcrumb">
                          <li><a href="#">Home</a></li>
                          <li class="active">Contact</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-top">
            <div class="row">
                <div class="col-sx-6 col-sm-6">
                    <div class="custommenu hidden-xs">
                        <a id="showLeft" href="#" title="" class="bt-menu-trigger"><i class="fa fa-bars"></i> <img src="upload/fav.png" alt=""></a>
                    </div>
                </div> 
                <center>
                 <div class="col-sm-6 col-xs-12 cen-xs text-right">
                    <ul class="list-inline social">
                        <li><h2 href="<?= @$this->facebook ?>"><i class="fa fa-facebook"></i></h2></li>
                        <li><h2 href="<?= @$this->instagram ?>"><i class="fa fa-instagram"></i></h2></li>
                        <li><h2 href="<?= @$this->whatsapp ?>"><i class="fa fa-whatsapp"></i></h2></li>
                    </ul>
                </div>
                </center>
            </div><!-- end row -->
            </div><!-- end row -->
        </div><!-- end content top -->

        <div class="content boxs">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.1797826571365!2d112.62775831450485!3d-7.980360694252416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd62822ebfbfad5%3A0x3e2bc72e918b7b8b!2skotakan.id!5e0!3m2!1sid!2sid!4v1521208708791" class="form-control" style="height: 350px !important;" frameborder="0" style="border:0" allowfullscreen></iframe>

                    <hr class="invis">

                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="general-title">
                                <h4>Contact Form</h4>
                                <hr>
                            </div><!-- end title -->

                            <div class="contact_form">
                                <div id="message"></div>
                                <form id="contactform" action="<?= base_url() ?>do_action?method=contact_form" name="contactform" method="post">
                                    <input type="text" name="nama" id="name" class="form-control" placeholder="Name" required autocomplete="off" /> 
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" autocomplete="off" /> 
                                    <input type="text" name="no_hp" id="phone" class="form-control" placeholder="Phone" autocomplete="off" /> 
                                    <textarea class="form-control" name="pesan" id="comments" rows="6" placeholder="Message Below"></textarea>
                                    <button type="submit" value="SEND" id="submit" class="btn btn-primary"> Kirim Pesan</button>
                                </form> 
                            </div>

                        </div><!-- end col -->
                    </div><!-- end row -->

                    <hr class="largehr">

                    <center><div class="row text-center">
                        <div class="col-sm-12">
                            <div class="team-desc">
                                <h4>Developer Office</h4>
                                <small>@DILo Malang</small>
                                <p>Jl. Basuki Rachmad 7-9 Klojen, Kota Malang, Indonesia</p>
                                <a href="#"><i class="fa fa-phone"></i> +62 823 3757 6338</a><br>
                                <a href="#"><i class="fa fa-envelope-o"></i> inikotakan@gmail.com</a>
                            </div><!-- end team-image -->
                        </div><!-- end col -->
                    </center>
                    </div><!-- end row -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end content -->

    

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