<div class="container mt-3">
	<div class="col-md-6">

		<div class="card">
		  <div class="card-header">
		   Ubah Data Anggota
		  </div>
		  <div class="card-body">
		    <form action="" method="POST">
				<div class="form-group">
		    		<label for="nama">Nama</label>
		    		<input type="text" class="form-control" id="nama" autocomplete="off" name="nama" value="<?= $anggota['nama']; ?>">
		    		<small class="form-text text-danger"><?= form_error('nama'); ?></small>
		  		</div>

		  		<div class="form-group">
		    		<label for="nis">NIS</label>
		    		<input type="text" class="form-control" id="nis" autocomplete="off" name="nis" value="<?= $anggota['nis']; ?>">
		    		<small class="form-text text-danger"><?= form_error('nis'); ?></small>
		  		</div>
		  		
		  		<div class="form-group">
		    		<label for="jenkel">Jenkel</label>
		    		<input type="text" class="form-control" id="jenkel" autocomplete="off" name="jenkel" value="<?= $anggota['jenkel']; ?>">
		    		<small class="form-text text-danger"><?= form_error('jenkel'); ?></small>
		  		</div>
		  		
		  		<div class="form-group">
				    <label for="agama">Agama</label>
				    <input type="text" class="form-control" id="agama" autocomplete="off" name="agama" value="<?= $anggota['agama']; ?>">
				    <small class="form-text text-danger"><?= form_error('agama'); ?></small>
				</div>

				<button type="submit" name="simpan" class="btn btn-primary float-right">
					Ubah
				</button>
			</form>
		  </div>
		</div>
	</div>
</div>