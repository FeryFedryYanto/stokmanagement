<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1,
    shrink-to-fit=no">
    <title> <?= $data['judul']; ?> </title>
    <link rel="icon" href="<?= BASEURL; ?>/img/favicon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/fontawesome/css/all.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
  </head>
  <body>

  <!-- NAVBAR -->
    <div class="fixed-top">
      <div class="navbarCore py-4">
        <div class="container">
          <div class="row">
            <div class="col-sm-11">
              <h3 class="font-weight-bold font-italic ml-4 judul "> Stok Management </h3>
            </div>
              <div class="col-sm-1">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="imgNav" src="<?= BASEURL; ?>/img/icons-user.png" alt="icons-user.png">
                </a>
                <div class="dropdown-menu dropdown-menu-right animate slideIn dropdownNav" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?= BASEURL; ?>/User/profile">Profile</a>
                  <a class="dropdown-item" href="<?= BASEURL; ?>/Logout">Sign out</a>
                </div>
            </div>
          </div>
        </div>
      </div>
      <hr class="hrNav">
    </div>

    <div class="container py-5">
      <div class="row">
        <div class="col-sm-12 vertical">
          <a href="<?= BASEURL; ?>/user" class="userVertical"> <i class="fa fa-user "></i> User </a>
          <a href="<?= BASEURL; ?>/home/tampil_barang" class="tableVertical"><i class="fa fa-table "></i> Tabel barang </a>
          <a href="<?= BASEURL; ?>/home/tambahBarang" class="tembahVertical "> Insert </a>
          <hr class="hrVertical">
        </div>
      </div>
    </div>