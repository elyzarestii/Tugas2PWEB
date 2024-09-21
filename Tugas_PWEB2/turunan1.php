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

// menyimpan hasil pemanggilan fungsi rampilPegawai ke variabel $a 
$a =  $izin-> tampilPegawai();
?>
