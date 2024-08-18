<?php $this->load->view('templates/header'); ?>
<div class="table-container">
	<table class="table">
		<thead>
		<tr>
			<th>Nama Proyek</th>
			<th>Tanggal Mulai</th>
			<th>Tanggal Selesai</th>
			<th>Actions</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($proyek as $item): ?>
			<tr>
				<td><?php echo htmlspecialchars($item['namaProyek']); ?></td>
				<td><?php echo htmlspecialchars($item['tglMulai']); ?></td>
				<td><?php echo htmlspecialchars($item['tglSelesai']); ?></td>
				<td>
					<a href="<?php echo site_url('proyek/edit/'.$item['id']); ?>">Edit</a>
					<a href="<?php echo site_url('proyek/delete/'.$item['id']); ?>" onclick="return confirm('Are you sure?')">Delete</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>
<?php $this->load->view('templates/footer'); ?>
