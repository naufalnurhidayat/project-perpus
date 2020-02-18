<div class="container">

<?php if( $this->session->flashdata('flash') ) : ?>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Buku <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		</div>
	</div>
<?php endif; ?>

	<div class="row mt-3">
		<div class="col-md-6">
			<a href="<?= base_url(); ?>data_buku/tambah" class="btn btn-primary">Tambah data</a>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-md-6">
			<form action="" method="POST">
				<div class="input-group">
					<input type="text" name="keyword" class="form-control" placeholder="Cari data buku...">
					<div class="input-group-append">
						<button type="submit" class="btn btn-primary">Cari</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-md-6">
			<h3>Data Buku</h3>
			<?php if( empty($data_buku) ) : ?>
				<div class="alert alert-danger" role="alert">Buku tidak ditemukan</div>
			<?php endif; ?>
				<ul class="list-group">
					<?php foreach ($data_buku as $buku) : ?>
				  <li class="list-group-item">
				  	<?= $buku['judul_buku']; ?>
				  	<a href="<?= base_url(); ?>data_buku/hapus/<?= $buku['id_buku']; ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin?');">Hapus</a>
				  	<a href="<?= base_url(); ?>data_buku/ubah/<?= $buku['id_buku']; ?>" class="badge badge-success float-right">Ubah</a>
				  	<a href="<?= base_url(); ?>data_buku/detail/<?= $buku['id_buku']; ?>" class="badge badge-primary float-right">Detail</a>		
				  </li>
				  	<?php endforeach; ?>
				</ul>
		</div>
	</div>
</div>