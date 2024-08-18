<?php $this->load->view('templates/header'); ?>
<div class="table-container">
	<div class="list-container">
		<?php foreach ($lokasiList as $item): ?>
			<div class="list-data">
				<span><strong>Nama Lokasi:</strong> <?php echo htmlspecialchars($item['namaLokasi']); ?></span>
				<span><strong>Kota:</strong> <?php echo htmlspecialchars($item['kota']); ?></span>
				<span><strong>Provinsi:</strong> <?php echo htmlspecialchars($item['provinsi']); ?></span>

				<div class="actions">
					<a href="<?php echo site_url('lokasi/edit/'.$item['id']); ?>">Edit</a>
					<a href="<?php echo site_url('lokasi/delete/'.$item['id']); ?>" onclick="return confirm('Are you sure?')">Delete</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<?php $this->load->view('templates/footer'); ?>
