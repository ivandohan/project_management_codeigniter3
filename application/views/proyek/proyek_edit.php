<?php $this->load->view('templates/header'); ?>
<div class="form-container">
	<form method="post" id="updateForm">
		<input type="hidden" name="id" value="<?php echo htmlspecialchars($proyek['id']); ?>">

		<label for="namaProyek">Nama Proyek</label>
		<input type="text" id="namaProyek" name="namaProyek" value="<?php echo htmlspecialchars($proyek['namaProyek']); ?>" required>

		<label for="client">Client</label>
		<input type="text" id="client" name="client" value="<?php echo htmlspecialchars($proyek['client']); ?>" required>

		<label for="pimpinanProyek">Pimpinan Proyek</label>
		<input type="text" id="pimpinanProyek" name="pimpinanProyek" value="<?php echo htmlspecialchars($proyek['pimpinanProyek']); ?>" required>

		<label for="keterangan">Keterangan</label>
		<input type="text" id="keterangan" name="keterangan" value="<?php echo htmlspecialchars($proyek['keterangan']); ?>" required>

		<label for="tglMulai">Tanggal Mulai</label>
		<input type="date" id="tglMulai" name="tglMulai" value="<?php echo htmlspecialchars($proyek['tglMulai']); ?>" required>

		<label for="tglSelesai">Tanggal Selesai</label>
		<input type="date" id="tglSelesai" name="tglSelesai" value="<?php echo htmlspecialchars($proyek['tglSelesai']); ?>" required>

		<label for="currentLokasiList">Lokasi Terkait</label>
		<ul>
			<?php foreach ($selectedLocationList as $lokasi): ?>
				<li>
					<input type="checkbox" name="idLokasiList[]" value="<?php echo $lokasi['id']; ?>" <?php echo in_array($lokasi['id'], $currentLokasiList) ? 'checked' : ''; ?>>
					<?php echo htmlspecialchars($lokasi['namaLokasi'] . ' - ' . $lokasi['kota'] . ', ' . $lokasi['provinsi']); ?>
				</li>
			<?php endforeach; ?>
		</ul>

		<label for="addLokasiList">Tambah Lokasi Baru</label>
		<select id="addLokasiList" name="idLokasiList[]" multiple>
			<option value="" disabled selected>Pilih Lokasi untuk Ditambahkan</option>
			<?php foreach ($lokasiList as $lokasi): ?>
				<?php if (!in_array($lokasi['id'], $currentLokasiList)): ?>
					<option value="<?php echo $lokasi['id']; ?>">
						<?php echo htmlspecialchars($lokasi['namaLokasi'] . ' - ' . $lokasi['kota'] . ', ' . $lokasi['provinsi']); ?>
					</option>
				<?php endif; ?>
			<?php endforeach; ?>
		</select>

		<button type="submit">Update</button>
	</form>
</div>
<?php $this->load->view('templates/footer'); ?>
