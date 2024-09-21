<?php
class Databases {
 
// variabel private untuk menyimpan koneksi database 
 private $host = 'localhost';
 private $name = 'root';
 private $pass = '';
 private $dbname = 'izin_ketidakhadiran'; // nama database yang akan digunakan
 
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