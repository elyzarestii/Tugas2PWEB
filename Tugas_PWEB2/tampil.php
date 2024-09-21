<?php
// memasukkan file koneksi database
include 'koneksi.php';
?>
<?php
// memasukkan file navigasi
include 'nav.php';
?>
<?php
// membuat instance dari kelas database untuk berinteraksi dengan database
$mysqli = new Databases();
	
?>
 
 <!-- Memulai tabel HTML -->
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
								<?php foreach ($mysqli->tampilPegawai() as $show) { ?>
									<tr>
										<td><?php echo $no++; // menampilkan nomor dan menambahkannya ?></td> 
										
										<td><?php echo $show['izin_id'] // menampilkan ID izin ?></td>
										<td><?php echo $show['keperluan'] // menampilkan keperluan izin ?></td>
										<td><?php echo $show['finger_print_id'] // menampilkan ID fingerprint ?></td>
										<td><?php echo $show['tgl_mulai_izin'] // menampilkan tanggal mulai izin ?></td>
										<td><?php echo $show['durasi_izin_hari'] // menampilkan durasi izin dalam hari ?></td>
										<td><?php echo $show['durasi_izin_jam'] // menampilkan durasi izin dalam jam ?></td>
										<td><?php echo $show['durasi_izin_menit'] // menampilkan durasi izin dalam menit ?></td>
										<td><?php echo $show['nama_pengusul'] // menampilkan nama pengusul izin ?></td>
										<td><?php echo $show['tgl_usul'] // menampilkan tanggal pengajuan izin ?></td>
										<td><?php echo $show['ttd_pengusul'] // menampilkan tanda tangan pengusul ?></td>
										<td><?php echo $show['putusan'] // menampilkan keputusan izin ?></td>
										<td><?php echo $show['tgl_disetujui'] // menampilkan tanggan persetujuan ?></td>
										<td><?php echo $show['ttd_atasan'] // menampilkan tanda tangan atasan ?></td>
										<td><?php echo $show['catatan'] // menampilkan catatan tambahan ?></td>
										<td><?php echo $show['dosen_id'] // menampilkan ID dosen?></td>
				
									</tr>
								<?php } ?>
						</tbody>
					</table>
                    