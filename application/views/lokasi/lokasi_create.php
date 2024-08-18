<?php $this->load->view('templates/header'); ?>

<div class="form-container">
	<h2>Tambah Lokasi Baru</h2>
	<form method="post" action="<?php echo site_url('lokasi/store'); ?>">
		<label for="namaLokasi">Nama Lokasi</label>
		<input type="text" id="namaLokasi" name="namaLokasi" required>

		<label for="negara">Negara</label>
		<input type="text" id="negara" name="negara" required>

		<label for="provinsi">Provinsi</label>
		<input type="text" id="provinsi" name="provinsi" required>

		<label for="kota">Kota</label>
		<input type="text" id="kota" name="kota" required>

		<button type="submit">Tambah Lokasi</button>
	</form>
</div>

<?php $this->load->view('templates/footer'); ?>
