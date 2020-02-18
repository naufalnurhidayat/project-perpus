<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/bootstrap/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">

  <title><?= $judul; ?></title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <img src="">
    <a class="navbar-brand" href="<?= base_url('home'); ?>">Perpustakaan</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="<?= base_url('home'); ?>">Home</a>
          <a class="nav-item nav-link" href="<?= base_url(); ?>data_anggota">Data Anggota</a>
          <a class="nav-item nav-link" href="<?= base_url(); ?>data_buku">Data Buku</a>
          <a class="nav-item nav-link" href="<?= base_url(); ?>transaksi">Transaksi</a>
          <a class="nav-item nav-link" href="<?= base_url(); ?>transaksi/data_transaksi">Data Peminjaman</a>
        </div>
        <div class="badge badge-primary float-right">
         Access: <?= date('l, d M Y'); ?>
        </div>
      </div>
      <a href="<?= base_url('user/logout'); ?>" class="btn btn-danger float-right" onclick="return confirm('Yakin ingin logout?');">Logout</a>
   </div>
</nav>
   