  # Tugas2PWEB

## koneksi.php 
     <?php
    class Databases {
 
    // variabel private untuk menyimpan koneksi database 
       private $host = 'localhost';
       private $name = 'root';
        private $pass = '';
       private $dbname = 'izin_ketidakhadiran'; // nama database yang akan       digunakan
 
       public $conn; // variabel public untuk menyimpan koneksi
  
        // konstruktor untuk kelas databases
           function __construct (){
         // membuat koneksi ke database menggunakan mysqli
           $this->conn = new mysqli($this->host, $this->name, $this->pass, $this->dbname);

         // memeriksa apakan koneksi sudah berhasil atau tidak
             if ($this->conn->connect_errno) {
             echo "DATABASE TIDAK ADA !  ";
             exit;
               }

              }

          // fungsi untuk mengambil data pegawai dari database
              public function tampilPegawai() {
           // query untuk memilih semua data dari tabel izin_ketidakhadiran_pegawai
              $data = "SELECT * FROM izin_ketidakhadiran_pegawai";
          // menggunakan koneksi untuk menjalankan query
            $hasil = $this->conn->query($data); // Menggunakan $this->conn untuk query

            $result = []; // Inisialisasi array kosong untuk hasil
              if ($hasil->num_rows > 0) {
              while ($d = $hasil->fetch_assoc()) { // fetch_assoc lebih efisien
                $result[] = $d;
                  }
                  }

            // mengembalikan array hasil
              return $result;
                }
                }
                ?>

# Deklarasi kelas = kelas database didefinisikan untuk mengatur koneksi dan interaksi dengan database.
# variabel private = seperti #host, $name, #pass dan $dbname = variabel ini menyimpan informasi penting untuk koneksi database, seperti host(local host), nama pengguna(root), password(kosong), dan nama database (izin_ketidakhadiran).
# untuk variabel publik $conn ini digunakkan untuk menyimpan objek koneksi yang akan dibuat dengan mysqli
# untuk metode __construct ini dijalankan saat objek dari kelas ini dibuat. Di sini untuk koneksi database digunakan menggunakan mysqli, dan jika koneksi gagal, pesan kesalahan ditampilkan dan eksekusi dihentikan.


## tampil.php

      <?php
      // memasukkan file koneksi database
          include 'koneksi.php';
          ?>
        <?php
    // memasukkan file navigasi
        include 'nav.php';
        ?>
        <?php
    // membuat instance dari kelas database untuk berinteraksi dengan             database
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
										<td><?php echo $no++; // menampilkan nomor dan   menambahkannya ?></td> 
										
										<td><?php echo $show['izin_id'] // menampilkan ID izin ?></td>
										<td><?php echo $show['keperluan'] // menampilkan   keperluan izin ?></td>
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

1. Inklusi File:

# include 'koneksi.php';: Mengimpor file koneksi database untuk menghubungkan aplikasi dengan database.
# include 'nav.php';: Mengimpor file navigasi, yang biasanya berisi menu atau tautan untuk navigasi aplikasi.
2. Instansiasi Kelas Database:

# $mysqli = new Databases();: Membuat objek baru dari kelas Databases, yang memungkinkan penggunaan metode di dalam kelas untuk berinteraksi dengan database.
3. Tabel HTML:

# Tabel dibuat menggunakan HTML <table>, dengan <thead> untuk mendefinisikan header tabel, berisi kolom seperti IZIN_ID, KEPERLUAN, TGL_MULAI_IZIN, dan lain-lain.
4. Penyajian Data:

# Variabel $no diinisialisasi dengan 1 untuk memberikan nomor urut pada setiap baris tabel.
# Setiap kolom diisi dengan data yang relevan, memberikan informasi yang jelas tentang setiap izin yang diajukan.

## turunan1.php
      <?php
        // menginpor file koneksi.php untuk menghubungkan ke database
          include('koneksi.php');
        ?>

      <?php
        // mendefinisikan kelas putusan Diizinkan yang mewarisi kelas database
          class putusanDiizinkan extends Databases{
          // konstruktor untuk kelas putusanDiizinkan
            public function __construct(){
            parent:: __construct(); // memanggil konstruktor kelas induk untuk inisialisasi koneksi

              }

            // fungsi untuk mengambil data pegawai dengan status 'Diizinkan'
              public function tampilPegawai() {
            // query untuk memilih semua pegawai dengan keputusan 'Diizinkan
              $result = "SELECT * from izin_ketidakhadiran_pegawai where putusan = 'Diizinkan'";
            // mengembalikan hasil query
                return $this->conn->query($result);

              }
              }

          // membuat instance dari kelas putusan Diizinkan
              $izin = new putusanDiizinkan();

          // menyimpan hasil pemanggilan fungsi rampilPegawai ke variabel                $a 
            $a =  $izin-> tampilPegawai();
            ?>
## turunan2.php
          <?php
            include('koneksi.php');
            ?>

          <?php
            // mendefinisikan kelas putusanTidakDiizinkan yang mewarisi kelas database
            class putusanTidakDiizinkan extends Databases{
            // konstruktor untuk kelas putusanTidakDiizinkan
              public function __construct(){
              parent:: __construct(); // memanggil konstruktor kelas induk inisialisasi koneksi

              }
            public function tampilPegawai() {
          // query untuk memilih semua pegawai dengan putusan 'TidakDiizinkan'
            $result = "SELECT * from izin_ketidakhadiran_pegawai where putusan = 'TidakDiizinkan'";
        // mengembalikan hasil query
        return $this->conn->query($result);

            }
            }

        // membuat intance dari kelas putusanTidakDiizinkan
          $izin2 = new putusanTidakDiizinkan ();

        // menyimpan hasil pemanggilan fungsi tampilPegawai ke variabel $b
          $b =  $izin2-> tampilPegawai();
            ?>

## tampil_turunan1.php
      <html>
      <head>
	  	<!-- memasukkan stylesheet Bootstrap untuk style -->
      <link         href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
# include = bertujuan untuk mengimpor file ke dalan skrip, yang biasanya berisi kelas fungsi, atau navigasi yang diperlukan.
# instansiasi kelas database ($mysqli) bertujuan untuk membuat objek dari kelas database, yang menginisialisasi koneksi ke database. penting untuk memungkinkan aplikasi melakukan query dan interaksi dengan database.
# kelas boostrap = table dan table-hover digunakan untuk memberikan gaya pada tabel dan efek hover pada baris tabel.
# foreach bertujuan mengiterasi array $a (yang diharapkan berisi hasil query dari database) dan menampilkan setiap elemen dalam format tebal

## tampil_turunan2.php
      <?php
        // menginpor file turunan2.php yang berisi definisi kelas atau fungsi
        include ('turunan2.php');
        ?>
        <?
        // menginpor file nav.php untuk navigasi
          include 'nav.php';
          ?>
        <?php
        // membuat instance dari kelas database untuk koneksi database
          $mysqli = new Databases();
	
          ?>
 
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
								<?php foreach ($b as $show) { ?>
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
## nav.php
    <html>
    <head>
    <link     href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark">
      <div class="container-fluid">
    <a class="navbar-brand" href="tampil.php">BERANDA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"       data-bs-target="#navbarSupportedContent" aria-      controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page"   href="tampil.php">DATA PEGAWAI</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="tampil_turunan1.php">DATA PEGAWAI DIIZINKAN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="tampil_turunan2.php">DATA PEGAWAI TIDAK DIIZINKAN</a>
        </li>
        </ul>
        <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
          </div>
          </div>
          </nav>
          </body>
          <script   src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
          </html>


# navbar adalah elemen penting dalam aplikasi web yang menyediakan cara terstruktur dan efisien bagi pengguna untuk menavigasi berbagai bagian aplikasi.
# navbar sendiri memiliki beberapa kegunaan penting seperti : Naavigasi yang mudah, Membuat tampilan yang konsisten, Organisasi dan struktur seperti "Home, Data izin, pengaturan, atau bagian lain yang relevan." , Interaktivitas, Desain Responsif, Aksesibilitas.   

                    
