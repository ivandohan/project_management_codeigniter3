<?php $this->load->view('templates/header'); ?>
<div class="table-container">
	<div class="list-container">
		<?php foreach ($proyek as $item): ?>
			<div class="list-data">
				<span><strong>Nama Proyek:</strong> <?php echo htmlspecialchars($item['namaProyek']); ?></span>
				<span><strong>Pimpinan:</strong> <?php echo htmlspecialchars($item['pimpinanProyek']); ?></span>
				<span><strong>Mulai:</strong> <?php echo htmlspecialchars($item['tglMulai']); ?></span>

				<div class="actions">
					<a href="<?php echo site_url('proyek/detail/'.$item['id']); ?>">Detail</a>
					<a href="<?php echo site_url('proyek/edit/'.$item['id']); ?>">Edit</a>
					<a href="<?php echo site_url('proyek/delete/'.$item['id']); ?>" onclick="return confirm('Are you sure?')">Delete</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<?php $this->load->view('templates/footer'); ?>
