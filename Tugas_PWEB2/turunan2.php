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
