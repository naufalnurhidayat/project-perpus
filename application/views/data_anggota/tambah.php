<div class="container mt-3">
	<div class="col-md-6">

		<div class="card">
		  <div class="card-header">
		    Tambah Data Anggota
		  </div>
<?php if ($this->session->flashdata('message')) : ?>
		  <div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>NIS</strong> ini sudah <?= $this->session->flashdata('message'); ?>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
<?php endif; ?>
		  <div class="card-body">
		  	<?php if(validation_errors() ) : ?>
				<div class="alert alert-danger" role="alert">
					<?= validation_errors(); ?>				
				</div>
			<?php endif; ?>
		    <form action="" method="POST">
				<div class="form-group">
		    		<label for="nis">NIS: </label>
		    		<input type="text" class="form-control" id="nis" autocomplete="off" name="nis">
		  		</div>

		  		<div class="form-group">
		    		<label for="nama">Nama: </label>
		    		<input type="text" class="form-control" id="nama" autocomplete="off" name="nama">
		  		</div>
		  		
		  		<div class="form-group">
		    		<label for="jenkel">Jenis Kelamin: </label>
		    		<input type="text" class="form-control" id="jenkel" autocomplete="off" name="jenkel">
		  		</div>
		  		
		  		<div class="form-group">
		    		<label for="agama">Agama: </label>
		    		<input type="text" class="form-control" id="agama" autocomplete="off" name="agama">
		  		</div>

				<button type="submit" name="simpan" class="btn btn-primary float-right">
					Tambah
				</button>
			</form>
		  </div>
		</div>
	</div>
</div>