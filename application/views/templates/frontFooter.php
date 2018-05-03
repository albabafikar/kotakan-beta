        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-5">
                        <div class="media cen-xs">
                            <p>
                                &copy; Kotakan Indonesia 2018 - All Rights Reserved | Beta Version.<br>
                                Idea by <a class="madeby" href="http://komaldev.com">@fikaralbaba @komalindonesia</a> made with <i class="fa fa-heart"></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <ul class="list-inline text-right cen-xs">
                        <ul class="nav navbar-nav navbar-center">
                            <li><a class="active" href="<?= base_url() ?>" title="">Home</a></li>
                            
                            <li><a href="<?= base_url() ?>about" title="">Tentang Kami</a></li>
                            <li><a href="<?= base_url() ?>blog" title="Blog &amp; Promo">Blog &amp; Promo</a></li>
                            <li><a href="<?= base_url() ?>contact" title="">FAQ &amp; Kontak</a></li>
                            <li><a href="<?= base_url() ?>confirmation" title="">Konfirmasi Pembayaran</a></li>
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
    function numericOnly(e){
      // Allow: backspace, delete, tab, escape, enter and .
      if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
           // Allow: Ctrl/cmd+A
          (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
           // Allow: Ctrl/cmd+C
          (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
           // Allow: Ctrl/cmd+X
          (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
           // Allow: home, end, left, right
          (e.keyCode >= 35 && e.keyCode <= 39)) {
               // let it happen, don't do anything
               return;
      }
      // Ensure that it is a number and stop the keypress
      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
      }
    } 
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
            format: "dd/mm/yyyy",
            todayHighlight: true,
            startDate: new Date()
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

    <!-- WhatsHelp.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+6282337576338", // WhatsApp number
            email: "inikotakan@gmail.com", // Email
            sms: "+6282337576338", // Sms phone number
            company_logo_url: "//static.whatshelp.io/img/flag.png", // URL of company logo (png, jpg, gif)
            greeting_message: "Hai .. \nKamu bisa pesan kotakan langsung disini loh .. ", // Text of greeting message
            call_to_action: "Pesan Tanpa Ribet ...", // Call to action
            button_color: "#932C8B", // Color of button
            position: "right", // Position may be 'right' or 'left'
            order: "whatsapp,email,sms", // Order of buttons
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /WhatsHelp.io widget -->
</body>
</html>