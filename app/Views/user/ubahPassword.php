<div class="container">
  <div class="row offset-2">
    <div class="col-sm-10">
      <h4 class="mt-5 " style="color: rgb(130,130,130);"> Ubah Password </h4>
	     <hr style="color: rgb(200,200,200);">
      
        <?php
        // jika ada error, tampilkan pesan error
        if (!empty($data['error'])):
      ?>

      <div id="divPesanError">
        <div class="mx-auto">
          <div class="alert alert-danger" role="alert">
            <ul class="mb-0">
            <?php
             foreach ($data['error'] as $pesan) {
               echo "<li>$pesan</li>";
             }
            ?>
            </ul>
          </div>
        </div>
      </div>

      <?php
        endif;
      ?>

	  <form method="post" action="<?= BASEURL; ?>/User/ubahPasswordProsses" id="formPassword">

        <div class="form-group">
          <label for="password_lama">Password Lama</label>
          <input type="password" class="form-control" name="password_lama">
        </div>

        <div class="form-group">
          <label for="password_baru">Password Baru</label>
          <small> (minimal 6 karakter, harus terdapat angka dan huruf) </small>
          <input type="password" class="form-control" name="password_baru">
        </div>

        <div class="form-group">
          <label for="ulangi_password_baru">Ulangi Password Baru</label>
          <input type="password" class="form-control" name="ulangi_password_baru">
        </div>

        <input type="submit" class="btn btn-primary" value="Update">

      </form>
    </div>
  </div>
</div>