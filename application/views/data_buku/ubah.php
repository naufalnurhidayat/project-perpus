<div class="container mt-3">
	<div class="col-md-6">

		<div class="card">
		  <div class="card-header">
		   Ubah Data Buku
		  </div>
		  <div class="card-body">
		    <form action="" method="POST">
		    		<input type="hidden" class="form-control" id="id_buku" autocomplete="off" name="id_buku" value="<?= $buku['id_buku']; ?>">

		  		<div class="form-group">
		    		<label for="judul_buku">Judul Buku</label>
		    		<input type="text" class="form-control" id="judul_buku" autocomplete="off" name="judul_buku" value="<?= $buku['judul_buku']; ?>">
		    		<small class="form-text text-danger"><?= form_error('judul_buku'); ?></small>
		  		</div>
		  		
		  		<div class="form-group">
		    		<label for="pengarang_buku">Pengarang</label>
		    		<input type="text" class="form-control" id="pengarang_buku" autocomplete="off" name="pengarang_buku" value="<?= $buku['pengarang_buku']; ?>">
		    		<small class="form-text text-danger"><?= form_error('pengarang_buku'); ?></small>
		  		</div>
		  		
		  		<div class="form-group">
				    <label for="penerbit_buku">Penerbit</label>
				    <input type="text" class="form-control" id="penerbit_buku" autocomplete="off" name="penerbit_buku" value="<?= $buku['penerbit_buku']; ?>">
				    <small class="form-text text-danger"><?= form_error('penerbit_buku'); ?></small>
				</div>

				<div class="form-group">
				    <label for="stok">Stok</label>
				    <input type="text" class="form-control" id="stok" autocomplete="off" name="stok" value="<?= $buku['stok']; ?>">
				    <small class="form-text text-danger"><?= form_error('stok'); ?></small>
				</div>

				<button type="submit" name="simpan" class="btn btn-primary float-right">
					Ubah
				</button>
			</form>
		  </div>
		</div>
	</div>
</div>