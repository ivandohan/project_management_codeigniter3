<?php $this->load->view('templates/header'); ?>

<div class="form-container">
	<h2>Edit Lokasi</h2>
	<form method="post" action="<?php echo site_url('lokasi/update/'.$lokasi['id']); ?>">
		<label for="namaLokasi">Nama Lokasi</label>
		<input type="text" id="namaLokasi" name="namaLokasi" value="<?php echo htmlspecialchars($lokasi['namaLokasi']); ?>" required>

		<label for="negara">Negara</label>
		<input type="text" id="negara" name="negara" value="<?php echo htmlspecialchars($lokasi['negara']); ?>" required>

		<label for="provinsi">Provinsi</label>
		<input type="text" id="provinsi" name="provinsi" value="<?php echo htmlspecialchars($lokasi['provinsi']); ?>" required>

		<label for="kota">Kota</label>
		<input type="text" id="kota" name="kota" value="<?php echo htmlspecialchars($lokasi['kota']); ?>" required>

		<button type="submit">Update Lokasi</button>
	</form>
</div>

<?php $this->load->view('templates/footer'); ?>
