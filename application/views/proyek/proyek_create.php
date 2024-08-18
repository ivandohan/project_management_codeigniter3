<?php $this->load->view('templates/header'); ?>
<div class="form-container">
	<form method="post">
		<label for="namaProyek">Nama Proyek</label>
		<input type="text" id="namaProyek" name="namaProyek" required>

		<label for="tglMulai">Tanggal Mulai</label>
		<input type="date" id="tglMulai" name="tglMulai" required>

		<label for="tglSelesai">Tanggal Selesai</label>
		<input type="date" id="tglSelesai" name="tglSelesai" required>

		<button type="submit">Submit</button>
	</form>
</div>
<?php $this->load->view('templates/footer'); ?>
