<div class="container">

<?php if( $this->session->flashdata('flash') ) : ?>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Anggota <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		</div>
	</div>
<?php endif; ?>

	<div class="row mt-3">
		<div class="col-md-6">
			<a href="<?= base_url(); ?>data_anggota/tambah" class="btn btn-primary">Tambah data</a>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-md-6">
			<form action="" method="POST">
				<div class="input-group">
					<input type="text" name="keyword" class="form-control" placeholder="Cari data anggota...">
					<div class="input-group-append">
						<button type="submit" class="btn btn-primary">Cari</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-md-6">
			<h3>Data Anggota</h3>
			<?php if( empty($data_anggota) ) : ?>
				<div class="alert alert-danger" role="alert">Anggota tidak ditemukan</div>
			<?php endif; ?>
				<ul class="list-group">
					<?php foreach ($data_anggota as $anggota) : ?>
				  <li class="list-group-item">
				  	<?= $anggota['nama']; ?>
				  	<a href="<?= base_url(); ?>data_anggota/hapus/<?= $anggota['nis']; ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin?');">Hapus</a>
				  	<a href="<?= base_url(); ?>data_anggota/ubah/<?= $anggota['nis']; ?>" class="badge badge-success float-right">Ubah</a>
				  	<a href="<?= base_url(); ?>data_anggota/detail/<?= $anggota['nis']; ?>" class="badge badge-primary float-right">Detail</a>		
				  </li>
				  	<?php endforeach; ?>
				</ul>
		</div>
	</div>
</div>