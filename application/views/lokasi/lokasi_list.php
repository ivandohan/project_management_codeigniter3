<?php $this->load->view('templates/header'); ?>
<div class="table-container">
	<table class="table">
		<thead>
		<tr>
			<th>ID</th>
			<th>Nama Lokasi</th>
			<th>Negara</th>
			<th>Provinsi</th>
			<th>Kota</th>
			<th>Created At</th>
			<th>Updated At</th>
			<th>Actions</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($lokasiList as $item): ?>
			<tr>
				<td><?php echo htmlspecialchars($item['id']); ?></td>
				<td><?php echo htmlspecialchars($item['namaLokasi']); ?></td>
				<td><?php echo htmlspecialchars($item['negara']); ?></td>
				<td><?php echo htmlspecialchars($item['provinsi']); ?></td>
				<td><?php echo htmlspecialchars($item['kota']); ?></td>
				<td><?php echo htmlspecialchars($item['createdAt']); ?></td>
				<td><?php echo htmlspecialchars($item['updatedAt']); ?></td>

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
