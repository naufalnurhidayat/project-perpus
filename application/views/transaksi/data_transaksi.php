<div class="container">
	<div class="row mt-3">
		<div class="col">

		<?php if( $this->session->flashdata('flash') ) : ?>
			<div class="row mt-3">
				<div class="col-md-6">
					<div class="alert alert-success alert-dismissible fade show" role="alert">
					  Data Peminjaman <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
				</div>
			</div>
		<?php endif; ?>

			<div class="row mt-3">
				<div class="col-md-6">
					<form action="" method="POST">
						<div class="input-group">
							<input type="text" name="keyword" class="form-control" placeholder="Cari data peminjaman...">
							<div class="input-group-append">
								<button type="submit" class="btn btn-primary">Cari</button>
							</div>
						</div>
					</form>
				</div>
			</div>

	<div class="row mt-3">
		<div class="col">
			<h3>Data Buku</h3>
				<?php if( empty($data_peminjaman) ) : ?>
					<div class="alert alert-danger" role="alert">Data peminjaman tidak ditemukan</div>
				<?php endif; ?>
			<table class="table">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">No.</th>
			      <th scope="col">Nama</th>
			      <th scope="col">Judul Buku</th>
			      <th scope="col">Tanggal Peminjaman</th>
			      <th scope="col">Tanggal Pengembalian</th>
			      <th scope="col">Aksi</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $nomor = 1; ?>
			  	<?php foreach ( $data_peminjaman as $peminjaman ) : ?>
			    <tr>
			      <th scope="row"><?= $nomor; ?></th>
			      <td><?= $peminjaman['nama']; ?></td>
			      <td><?= $peminjaman['judul_buku']; ?></td>
			      <td><?= $peminjaman['tanggal_peminjaman']; ?></td>
			      <td><?= $peminjaman['tanggal_pengembalian']; ?></td>
			      <td>
			      	<a href="<?= base_url(); ?>transaksi/perpanjangbuku/<?= $peminjaman['id_transaksi']; ?>" class="badge badge-success" onclick="return confirm('Yakin ingin memperpanjang?');">Perpanjang</a>
			      	<a href="<?= base_url(); ?>transaksi/bukukembali/<?= $peminjaman['id_transaksi']; ?>/<?= $peminjaman['id_buku']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin mengembalikan?');">Kembalikan</a>
			      </td>
			    </tr>
			    <?php $nomor++; ?>
				<?php endforeach; ?>
			  </tbody>
			</table>
		</div>
	</div>
		</div>
	</div>
</div>