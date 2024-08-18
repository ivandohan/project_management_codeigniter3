<?php $this->load->view('templates/header'); ?>

<div class="detail-container">
	<h2>Detail Proyek: <?php echo htmlspecialchars($proyek['namaProyek']); ?></h2>
	<div class="proyek-detail">
		<p><strong>Client:</strong> <?php echo htmlspecialchars($proyek['client']); ?></p>
		<p><strong>Pimpinan Proyek:</strong> <?php echo htmlspecialchars($proyek['pimpinanProyek']); ?></p>
		<p><strong>Keterangan:</strong> <?php echo htmlspecialchars($proyek['keterangan']); ?></p>
		<p><strong>Tanggal Mulai:</strong> <?php echo htmlspecialchars($proyek['tglMulai']); ?></p>
		<p><strong>Tanggal Selesai:</strong> <?php echo htmlspecialchars($proyek['tglSelesai']); ?></p>
	</div>

	<h3>Lokasi Proyek:</h3>
	<div class="lokasi-list">
		<?php foreach ($lokasiList as $lokasi): ?>
			<div class="lokasi-item">
				<h4><?php echo htmlspecialchars($lokasi['namaLokasi']); ?></h4>
				<p><?php echo htmlspecialchars($lokasi['kota'] . ', ' . $lokasi['provinsi']); ?></p>
				<p><?php echo htmlspecialchars($lokasi['negara']); ?></p>
			</div>
		<?php endforeach; ?>
	</div>

	<div class="action-buttons">
		<a href="<?php echo site_url('proyek/edit/'.$proyek['id']); ?>" class="btn btn-edit">Edit</a>
		<a href="<?php echo site_url('proyek/delete/'.$proyek['id']); ?>" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
	</div>
</div>

<?php $this->load->view('templates/footer'); ?>
