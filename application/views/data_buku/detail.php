<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			
			<div class="card">
				<div class="card-header">
					Detail Data Buku
				</div>
				<div class="card-body">
					<h5 class="card-title"><?= $buku['judul_buku']; ?></h5>
					<h6 class="card-subtitle mb-2 text-muted"><?= $buku['pengarang_buku']; ?></h6>
					<p class="card-text"><?= $buku['penerbit_buku']; ?></p>
					<p class="card-text"><?= $buku['stok']; ?></p>
					<a href="<?= base_url(); ?>data_buku" class="btn btn-primary">Kembali</a>
				</div>
			</div>

		</div>
	</div>
</div>