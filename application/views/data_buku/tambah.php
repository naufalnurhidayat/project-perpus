<div class="container mt-3">
	<div class="col-md-6">

		<div class="card">
		  <div class="card-header">
		    Tambah Data Buku
		  </div>
		  <div class="card-body">
		  	<?php if(validation_errors() ) : ?>
				<div class="alert alert-danger" role="alert">
					<?= validation_errors(); ?>				
				</div>
			<?php endif; ?>
		    <form action="" method="POST">
				<div class="form-group">
		    		<label for="judul_buku">Judul Buku: </label>
		    		<input type="text" class="form-control" id="judul_buku" autocomplete="off" name="judul_buku">
		  		</div>

		  		<div class="form-group">
		    		<label for="pengarang_buku">Pengarang: </label>
		    		<input type="text" class="form-control" id="pengarang_buku" autocomplete="off" name="pengarang_buku">
		  		</div>
		  		
		  		<div class="form-group">
		    		<label for="penerbit_buku">Penerbit: </label>
		    		<input type="text" class="form-control" id="penerbit_buku" autocomplete="off" name="penerbit_buku">
		  		</div>

		  		<div class="form-group">
		    		<label for="stok">Stok: </label>
		    		<input type="text" class="form-control" id="stok" autocomplete="off" name="stok">
		  		</div>

				<button type="submit" name="simpan" class="btn btn-primary float-right">
					Tambah
				</button>
			</form>
		  </div>
		</div>
	</div>
</div>