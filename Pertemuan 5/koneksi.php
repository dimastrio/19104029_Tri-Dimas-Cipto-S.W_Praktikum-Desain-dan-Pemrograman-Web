<!-- Membuat koneksi php untuk menghubungkan dengan database -->
<?php
    $host = "localhost";                            // nama localhost
    $user = "root";                                 // nama user
    $pass = "";                                     // password
    $dbname = "php_crud";                           // nama database pada xampp

    // untuk mengakses server database MySQL dengan data diatas
    $conn = new mysqli($host,$user,$pass,$dbname);

    // menampilkan pesan ketika koneksi gagal
    if($conn->connect_error) {
        die('Koneksi Gagal : '. $conn->connect_error);
    }
?>