				<!-- footer content -->
        <footer>
          <div class="pull-right">
            Developed by Kotakan Team &copy; 2018.
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->

        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url() ?>vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url() ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url() ?>vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?= base_url() ?>vendors/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="<?= base_url() ?>vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

    <?php if($this->uri->segment(2) == 'item'): ?>
    <!-- Valiator -->
    <script src="<?= base_url() ?>vendors/validator/validator.js"></script>
    <script type="text/javascript">
      var list_subkategori = <?= json_encode(@$list_subkategori) ?>;
      $(document).ready( function(){
          <?php if ( $this->input->get('action')): ?>
          $("#subkategori").hide();
          isHaveSubKategori($("#kategoriValue").attr('data-kategori'));
          var subKategori = getSubKategori(list_subkategori, $("#kategoriValue").attr('data-kategori'));
          $("#subkategoriValue").html("<strong>"+subKategori.nama+"</strong>");
          $("#imgPreview").hide();
          <?php endif; ?>
      })

      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $('#imgPreview').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
        }
      }

      $("#imgUpload").change(function() {
        readURL(this);
        $("#imgPreview").show();
      });

      function isHaveSubKategori(id) {
        var haveSub = getSubKategori(list_subkategori, id);
        haveSub ? $("#subkategori").show() : $("#subkategori").hide();
      }

      function getSubKategori(jsonData, id){
        if(jsonData != '') {
          data = jsonData.filter(function(index) {return index.id_kategori == id});
          return data.length > 0 ? data[0] : false; 
        }
      }
    </script>
    <?php endif; ?>

    <!-- Custom Theme Scripts -->
    <script src="<?= base_url() ?>build/js/custom.min.js"></script>
    
  </body>
</html>