  <div class="container">
    <div class="row">
      <div class="col-12 col-md-8 col-lg-6 py-4">
      <h1 class="h2 mr-auto"><a class="text-info" href="register_user.php">
        Register User</a></h1>

      <?php
        // jika ada error, tampilkan pesan error
        if (!empty($data['pesanError'])):
      ?>

      <div id="divPesanError">
        <div class="mx-auto">
          <div class="alert alert-danger" role="alert">
            <ul class="mb-0">
            <?php
             foreach ($data['pesanError'] as $pesan) {
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

      <!-- Form untuk proses insert -->
      <form method="post" action="<?= BASEURL; ?>/Register/cekRegister">

        <div class="form-group">
          <label for="username">Username</label>
          <small> (minimal 4 karakter angka atau huruf) </small>
          <input type="text" class="form-control" name="username"
          value="<?php echo $data['user']->getItem('username'); ?>">
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <small> (minimal 6 karakter, harus terdapat angka dan huruf) </small>
          <input type="password" class="form-control" name="password">
        </div>

        <div class="form-group">
          <label for="ulangi_password">Ulangi Password</label>
          <input type="password" class="form-control" name="ulangi_password">
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" name="email"
          value="<?php echo $data['user']->getItem('email'); ?>">
        </div>
        <input type="submit" class="btn bg-info text-white rounded" value="Daftar">
        <a href="<?= BASEURL; ?>/Login" class="btn bg-danger text-white ml-1">Batal</a>

      </form>

      </div>
    </div>
  </div>