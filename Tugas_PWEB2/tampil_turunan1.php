<html>
    <head>
		<!-- memasukkan stylesheet Bootstrap untuk style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

<body>
<?php
// menginpor file turunan1.php
include ('turunan1.php');
?>
<?php
// menginpor file nav.php untuk navigasi
include 'nav.php';
?>
<?php
// membuat instance dari kelas database untuk koneksi database
$mysqli = new Databases();
	
?>
 <!-- membuat tabel dengan class Boostrap untuk tampilan -->
<table class="table table-hover">
 <thead>
	<tr>
		<th>NO</th>
	
		<th>IZIN_ID</th>
		<th>KEPERLUAN</th>
		<th>FINGER_PRINT_ID</th>
		<th>TGL_MULAI_IZIN</th>
		<th>DURASI_IZIN_HARI</th>
		<th>DURASI_IZIN_JAM</th>
		<th>DURASI_IZIN_MENIT</th>
		<th>NAMA_PENGUSUL</th>
		<th>TGL_USUL</th>
		<th>TTD_PENGUSUL</th>
		<th>PUTUSAN</th>
		<th>TGL_DISETUJUI</th>
		<th>TTD_ATASAN</th>
		<th>CATATAN</th>
		<th>DOSEN_ID</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; ?>
								<?php foreach ($a as $show) { ?>
									<tr>
										<td><?php echo $no++; // menampilkan nomor urut ?></td>
										
										<td><?php echo $show['izin_id'] ?></td>
										<td><?php echo $show['keperluan'] ?></td>
										<td><?php echo $show['finger_print_id'] ?></td>
										<td><?php echo $show['tgl_mulai_izin'] ?></td>
										<td><?php echo $show['durasi_izin_hari'] ?></td>
										<td><?php echo $show['durasi_izin_jam'] ?></td>
										<td><?php echo $show['durasi_izin_menit'] ?></td>
										<td><?php echo $show['nama_pengusul'] ?></td>
										<td><?php echo $show['tgl_usul'] ?></td>
										<td><?php echo $show['ttd_pengusul'] ?></td>
										<td><?php echo $show['putusan'] ?></td>
										<td><?php echo $show['tgl_disetujui'] ?></td>
										<td><?php echo $show['ttd_atasan'] ?></td>
										<td><?php echo $show['catatan'] ?></td>
										<td><?php echo $show['dosen_id'] ?></td>
				
									</tr>
								<?php } ?>
						</tbody>
					</table>
                                </body>
				
                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
                                </html>
                    