<!DOCTYPE html>
<html>
<head>
	<title>Daftar Lokasi</title>
</head>
<body>

<h1>Daftar Lokasi</h1>

<table border="1">
	<thead>
	<tr>
		<th>ID</th>
		<th>Nama Lokasi</th>
		<th>Negara</th>
		<th>Provinsi</th>
		<th>Kota</th>
		<th>Created At</th>
		<th>Updated At</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($lokasiList as $lokasi): ?>
		<tr>
			<td><?php echo $lokasi['id']; ?></td>
			<td><?php echo $lokasi['namaLokasi']; ?></td>
			<td><?php echo $lokasi['negara']; ?></td>
			<td><?php echo $lokasi['provinsi']; ?></td>
			<td><?php echo $lokasi['kota']; ?></td>
			<td><?php echo $lokasi['createdAt']; ?></td>
			<td><?php echo $lokasi['updatedAt']; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

<a href="<?php echo site_url('proyek'); ?>">Kembali ke Daftar Proyek</a>

</body>
</html>
