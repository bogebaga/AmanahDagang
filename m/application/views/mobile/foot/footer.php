<section class="container-fluid" style="padding:0;">
  <div class="navigation-bottom">
    <a href="<?php echo base_url('home/mobile-pasang-iklan') ?>">Pasang Iklan</a>
    <a href="<?php echo base_url('home/mobile-akun-saya') ?>">Akun Saya</a>
    <?php if (! empty($this->session->userdata('user_email'))): ?>
      <a href="<?php echo base_url('signout') ?>">Keluar</a>
    <?php endif; ?>
    <a href="">Pusat Bantuan</a>
  </div>
</section>
<br>
<footer>
  <!-- <img src="<?php echo base_url("images/AMANAH_WHITE_2850x650.png") ?>" alt=""> -->
  <div class="social-media">
    <a href="#">
      <div class="sprite-media facebook"></div>
    </a>
    <a href="#">
      <div class="sprite-media googleplus"></div>
    </a>
    <a href="#">
      <div class="sprite-media twitter"></div>
    </a>
    <a href="#">
      <div class="sprite-media youtube"></div>
    </a>
    <a href="#">
      <div class="sprite-media linkedin"></div>
    </a>
  </div>
</footer>
<script type="text/javascript">
  $(".alert").alert();
</script>
</body>
</html>
