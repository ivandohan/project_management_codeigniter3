<?php $this->load->view('templates/header'); ?>

<div class="form-container">
	<form method="post" action="<?php echo site_url('proyek/store'); ?>">
		<label for="namaProyek">Nama Proyek</label>
		<input type="text" id="namaProyek" name="namaProyek" required>

		<label for="client">Client</label>
		<input type="text" id="client" name="client" required>

		<label for="pimpinanProyek">Pimpinan Proyek</label>
		<input type="text" id="pimpinanProyek" name="pimpinanProyek" required>

		<label for="keterangan">Keterangan</label>
		<input type="text" id="keterangan" name="keterangan" required>

		<label for="tglMulai">Tanggal Mulai</label>
		<input type="date" id="tglMulai" name="tglMulai" required>

		<label for="tglSelesai">Tanggal Selesai</label>
		<input type="date" id="tglSelesai" name="tglSelesai" required>

		<label for="lokasi">Pilih Lokasi</label>
		<select id="lokasi" name="lokasi">
			<?php foreach ($lokasiList as $lokasi): ?>
				<option value="<?php echo $lokasi['id']; ?>"><?php echo $lokasi['namaLokasi']; ?></option>
			<?php endforeach; ?>
		</select>
		<button type="button" id="add-lokasi">Tambah Lokasi</button>

		<div id="selected-locations">
			<h3>Lokasi yang Dipilih:</h3>
			<ul id="location-list"></ul>
		</div>

		<input type="hidden" id="idLokasiList" name="idLokasiList" value="">

		<button type="submit">Tambahkan Proyek</button>
	</form>
</div>

<script>
	let selectedLocations = [];

	document.getElementById('add-lokasi').addEventListener('click', function () {
		let lokasiSelect = document.getElementById('lokasi');
		let lokasiId = lokasiSelect.value;
		let lokasiText = lokasiSelect.options[lokasiSelect.selectedIndex].text;

		if (!selectedLocations.includes(lokasiId)) {
			selectedLocations.push(lokasiId);
			let locationList = document.getElementById('location-list');
			let listItem = document.createElement('li');
			listItem.textContent = lokasiText;
			locationList.appendChild(listItem);
		}

		document.getElementById('idLokasiList').value = selectedLocations.join(',');
	});
</script>

<?php $this->load->view('templates/footer'); ?>
