<div class="container mt-3">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<h3>Pinjam Buku</h3>
			</div>

			<div class="card-body">
				<?php if(validation_errors() ) : ?>
				<div class="alert alert-danger" role="alert">
					<?= validation_errors(); ?>				
				</div>
				<?php endif; ?>
				<form action="" method="POST">
					 <div class="form-group">
					   <label for="nama">Nama Anggota</label>
					   <select class="form-control" id="nama" name="nama">
					   	 <option value="">--Pilih Anggota--</option>
					   	<?php foreach ( $anggota_pinjam as $anggota) : ?>
					     <option value="<?= $anggota['nis']; ?>"><?= $anggota['nama']; ?></option>
					    <?php endforeach; ?>
					   </select>
					 </div>
					 <div class="form-group">
					   <label for="judul">Judul Buku</label>
					   <select class="form-control" id="judul" name="judul">
					   	 <option value="">--Pilih Buku--</option>
					     <?php foreach ( $buku_pinjam as $buku) : ?>
					     <option value="<?= $buku['id_buku']; ?>"><?= $buku['judul_buku']; ?></option>
					 <?php endforeach; ?>
					   </select>
					 </div>
					 <div class="form-group">
					   <label for="tanggal_pinjam">Tanggal Peminjaman</label>
					   <input type="text" class="form-control" id="tanggal_pinjam" value="<?= date('l, d-M-Y'); ?>" name="tanggal_pinjam">
				  	 </div>
				  	 <div class="form-group">
					   <label for="tanggal_kembali">Tanggal Pengembalian</label>
					   <input type="text" class="form-control" id="tanggal_kembali" value="<?= date('l, d-M-Y', time()+60*60*24*7); ?>" name="tanggal_kembali">
				  	 </div>
				  	 <button type="submit" class="btn btn-primary" name="pinjam">Pinjam</button>
				</form>
			</div>
		</div>
	</div>
</div>