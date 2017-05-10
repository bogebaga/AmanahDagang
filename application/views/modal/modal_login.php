<!-- Modal -->
<div class="modal fade" id="masuk" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Login</h4>
          </div>
          <div class="modal-body">
            <?php echo form_open('login'); ?>
              <input type="text" name="email" placeholder="Email" required>
              <input type="password" name="password" placeholder="Password" required>
              <button type="submit" name="submit" class="btn btn-primary">Masuk</button>
            <?php echo form_close();?>
          </div>
          <div class="modal-footer">
            <h4>Belum Punya Akun ? Silahkan <a href="./">Mendaftar</a></h4>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
</div>
