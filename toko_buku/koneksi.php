<?php
$conn = mysqli_connect('localhost', 'root', '', 'db_perpustakaan');

if (mysqli_connect_error()) {
    echo "Koneksi Gagal: " . mysqli_connect_error() . "<br>";
    exit();
}
?>
