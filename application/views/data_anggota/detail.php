<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			
			<div class="card">
				<div class="card-header">
					Detail Data Anggota
				</div>
				<div class="card-body">
					<h5 class="card-title"><?= $anggota['nama']; ?></h5>
					<h6 class="card-subtitle mb-2 text-muted"><?= $anggota['nis']; ?></h6>
					<p class="card-text"><?= $anggota['jenkel']; ?></p>
					<p class="card-text"><?= $anggota['agama']; ?></p>
					<a href="<?= base_url(); ?>data_anggota" class="btn btn-primary">Kembali</a>
				</div>
			</div>

		</div>
	</div>
</div>