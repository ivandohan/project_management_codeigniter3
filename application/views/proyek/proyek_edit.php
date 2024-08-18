<?php $this->load->view('templates/header'); ?>
<div class="form-container">
	<form method="post">
		<input type="hidden" name="id" value="<?php echo htmlspecialchars($proyek['id']); ?>">

		<label for="namaProyek">Nama Proyek</label>
		<input type="text" id="namaProyek" name="namaProyek" value="<?php echo htmlspecialchars($proyek['namaProyek']); ?>" required>

		<label for="tglMulai">Tanggal Mulai</label>
		<input type="date" id="tglMulai" name="tglMulai" value="<?php echo htmlspecialchars($proyek['tglMulai']); ?>" required>

		<label for="tglSelesai">Tanggal Selesai</label>
		<input type="date" id="tglSelesai" name="tglSelesai" value="<?php echo htmlspecialchars($proyek['tglSelesai']); ?>" required>

		<button type="submit">Update</button>
	</form>
</div>
<?php $this->load->view('templates/footer'); ?>
