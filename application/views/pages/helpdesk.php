<div class="bungkus">
  <section class="detail-barang">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>">Home</a> </li><li class="active"><?php echo $isi_helpdesk[0]['ad_helpdesk'] ?></li>
    </ol>
    <div class="deskripsi-barang">
      <?php echo $isi_helpdesk[0]['ad_fill_text']; ?>
      <p>
        Hati-hati dengan penipuan. Bertemu langsung dengan penjual adalah cara aman berbelanja.
      </p>
    </div>
  </section>
</div>
<?php if ($isi_helpdesk[0]['ad_helpdesk'] == 'Tentang Kami'): ?>
  <div style="height:calc(100vh - 720px)"></div>
<?php endif; ?>
