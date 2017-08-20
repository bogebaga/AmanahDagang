<footer>
  <div class="footer1">
    <ul class="footer-heading">
      <li><a href="<?php echo $network ?>">About Us</a></li>
      <li><a href="#">Contact Us</a></li>
      <li><a href="#">Privacy Policy</a></li>
      <li><a href="#">Aturan dan Ketentuan</a></li>
      <li><a href="#">Disclaimer</a></li>
      <li><a href="#">Tips Belanja</a></li>
    </ul>
    <div class="garis-footer"></div>
    <div class="social-media">
      <a href="https://www.facebook.com/profile.php?id=100019591120282" target="_blank">
        <div class="sprite-media facebook"></div>
      </a>
      <a href="https://plus.google.com/u/0/109458552857548437750" target="_blank">
        <div class="sprite-media googleplus"></div>
      </a>
      <a href="https://twitter.com/amanahstores" target="_blank">
        <div class="sprite-media twitter"></div>
      </a>
      <!-- <a href="#">
        <div class="sprite-media youtube"></div>
      </a> -->
      <a href="https://www.linkedin.com/in/amanah-stores-7630a8147/" target="_blank">
        <div class="sprite-media linkedin"></div>
      </a>
    </div>
    <div class="footer-law">
      <p>
        &copy;&nbsp;2017 amanahstores.com All Right Reserved
      </p>
    </div>
  </div>
</footer>
<?php $this->load->view('analytics'); ?>
<script src="<?php echo base_url('web/js/FormatCur.js')?>" charset="utf-8"></script>
<script src="<?php echo base_url('web/js/slideImages.js')?>" charset="utf-8"></script>
<script src="<?php echo base_url('web/js/Region.js')?>" charset="utf-8"></script>
<script>
  $('#harga_barang').maskMoney({thousands: '.', decimal: ',', precision: 0});
  $(".alert").alert();
  
  tinymce.init({
    selector: 'textarea',
    height: 220,
    image_advtab:true,
    menubar:false,
    plugins:
      'advlist autolink lists link image charmap print preview hr anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking save table contextmenu directionality emoticons template paste textcolor colorpicker textpattern imagetools',
    toolbar:[
      'undo redo | bold italic | alignleft aligncenter alignjustify | bullist numlist outdent indent',
      'forecolor backcolor | fontselect fontsizeselect'
    ]
  });
</script>
</body>
</html>
