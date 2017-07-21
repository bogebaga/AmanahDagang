<section class="container-fluid" style="padding:0;">
  <div class="navigation-bottom">
    <a href="<?php echo base_url('tron/home/mobile-pasang-iklan') ?>">Pasang Iklan</a>
    <a href="<?php echo base_url('tron/home/mobile-akun-saya') ?>">Akun Saya</a>
    <?php if (! empty($this->session->userdata('user_email'))): ?>
      <a href="<?php echo base_url('signout/mobile') ?>">Keluar</a>
    <?php endif; ?>
    <a href="">Pusat Bantuan</a>
  </div>
</section>
<br>
</body>
</html>
