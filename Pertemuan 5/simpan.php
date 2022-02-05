<!-- Membuat fungsi simpan untuk menyimpan data ke tabel pada database -->
<?php
    include "koneksi.php";          // mengambil koneksi

    $nama = $_POST['nama'];         // mengambil data nama pada database
    $kelas = $_POST['kelas'];       // mengambil data kelas pada database
    $alamat = $_POST['alamat'];     // mengambil data alamat pada database

    // fungsi input data pada tabel
    $sql = "INSERT into data(nama, kelas, alamat) VALUES('$nama','$kelas','$alamat')";
    $add = $conn->query($sql);

    // ketika berhasil maka akan diarahkan ke halaman index.php
    if($add) {
        $conn->close();
        header("location:index.php");
        exit();
    // ketika gagal muncul pesan error
    } else {
        echo "Error : ".$conn->error;
        $conn->close();
        exit();
    }
?>