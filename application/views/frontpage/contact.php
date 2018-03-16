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

                <div class="col-sm-6 col-xs-12 cen-xs text-right">
                    <ul class="list-inline social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div><!-- end row -->
        </div><!-- end content top -->

        <div class="content boxs">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="googlemap">
                        <div id="map"></div>
                    </div><!-- end googlemap -->

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

        <div class="content-after noborder text-center boxs">

        </div><!-- end content after -->

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