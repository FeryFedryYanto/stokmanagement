<div class="container pt-5">
    <?php
        // jika ada error, tampilkan pesan error
        if (!empty($data['pesanError'])) :
    ?>
     <div class="row">
      <div class="col-10 col-sm-8 col-md-6 col-lg-5 col-xl-4 mx-auto">
        <div class="alert alert-danger" role="alert">
          <ul class="mb-0">
          <?php
            foreach ($data['pesanError'] as $val) {
              echo "<li>$val</li>";
            }
          ?>
          </ul>
        </div>
      </div>
    </div>

  <?php
    endif;
  ?>

    <div class="row">
      <div class="col-10 col-sm-8 col-md-6 col-lg-5 col-xl-4 mx-auto">
        <div class="card">
          <div class="card-header">
            <h4>Account Login</h4>
          </div>
          <div class="card-body">
            <form method="post" action="<?= BASEURL; ?>/Login/cekLogin" autocomplete="off">
              <div class="form-group">
                <label for="username">  
                  <img src="<?= BASEURL; ?>/img/icons-user2.png" alt="icons-user2.png">
                  Username
                </label>
                <input  type="username" class="form-control" name="username"
                  value="<?php echo $data['user']->getItem('username'); ?>"  id="username" >
              </div>
              <div class="form-group">
                <label for="password">
                  <img src="<?= BASEURL; ?>/img/icons-password.png" alt="icons-password.png">
                  Password
                </label>
                <input type="password" class="form-control" name="password" id="password">
              </div>
              <input type="submit" class="btn btn-info btn-block rounded-pill"
              value="Login">
            </form>
            <p class="mt-2 text-center">
              <small class="text-center">Belum terdaftar? Silahkan
                <a href="<?= BASEURL; ?>/Register">register</a> terlebih dahulu
              </small>
            </p>
          </div>
        </div>
      </div>

    </div>
    </div>
