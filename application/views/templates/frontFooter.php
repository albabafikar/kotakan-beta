        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-5">
                        <div class="media cen-xs">
                            <p>
                                &copy; Kotakan Indonesia 2018 - All Rights Reserverd.<br>
                                Idea by <a class="madeby" href="http://komaldev.com">@fikaralbaba @komalindonesia</a> made with <i class="fa fa-heart"></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <ul class="list-inline text-right cen-xs">
                        <li><a href="<?= base_url() ?>">Home</a></li>
                        <ul class="nav navbar-nav navbar-center">
                            <li><a class="active" href="<?= base_url() ?>" title="">Home</a></li>
                            
                            <li><a href="<?= base_url() ?>about" title="">Tentang Kami</a></li>
                            <li><a href="#" title="">Blog &amp; Promo</a></li>
                            <li><a href="<?= base_url() ?>contact" title="">FAQ &amp; Kontak</a></li>
                        </ul>
                        </ul>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </footer><!-- end footer -->
    </div><!-- end wrapper -->
    <!-- END SITE -->

    <script src="<?= base_url() ?>resources/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>resources/js/bootstrap.js"></script>
    <script src="<?= base_url() ?>resources/js/custom.js"></script>
    <script src="<?= base_url() ?>resources/js/bootstrap-datepicker.min.js"></script>
    <?php if($this->uri->segment(1) == 'contact'): ?>
    <!-- MAP & CONTACT -->
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="<?= base_url() ?>resources/js/map.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=<?= @$this->googleMapsKey ?>" type="text/javascript"></script>
    <?php 
    elseif($this->uri->segment(1) == 'order'): 
    $getdata = $this->input->get();
    ?>
    <script type="text/javascript">
    $(document).ready(function(){
      <?php if(@$getdata['form'] != 'nasikotak'): ?>
    <?php elseif($this->uri->segment(1) == 'order'): ?>
    <script type="text/javascript">
    $(document).ready(function(){
      $("#submit").submit(function(e){
        e.preventDefault();
        if($('#items:checkbox:checked').length == 0) {
          alert('Anda belum memilih menu!');
        } else {
          $(this).unbind('submit').submit();
        }
      });
      <?php endif; ?>
      });    
    });
    </script>
    <?php elseif($this->uri->segment(1) == 'payment'): ?>
    <script type="text/javascript">
    $(document).ready(function(){
      $("#submit").submit(function(e){
        e.preventDefault();
        if($('#agree:checkbox:checked').length == 0) {
          alert('Anda belum setuju!');
        } else {
          $(this).unbind('submit').submit();
        }
      });    
    });
    </script>
    <?php endif; ?>
    <!-- FlexSlider JavaScript -->
    <script src="<?= base_url() ?>resources/js/flexslider.js"></script>
    <script>
    (function($) {
    "use strict";
    $(window).load(function() {
        if($(".datepicker").length != 0){
          $(".datepicker").datepicker({
            format: "dd/mm/yyyy"
          })
        }
        $('#carousel').flexslider({
            animation: "slide",
            controlNav: false,
            directionNav: false,
            animationLoop: true,
            slideshow: true,
            itemWidth: 92,
            itemMargin: 0,
            asNavFor: '#slider'
        });

        $('#slider').flexslider({
            animation: "fade",
            controlNav: false,
            animationLoop: false,
            slideshow: true,
            sync: "#carousel"
        });
    });
    })(jQuery);
    </script>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5a53171f4b401e45400be716/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
</body>
</html>