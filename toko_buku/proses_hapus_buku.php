<?php
include "koneksi.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Periksa apakah buku dengan ID yang diberikan ada di database
    $qry_cek_buku = mysqli_query($conn, "SELECT * FROM tb_buku WHERE id = '$id'");
    $dt_buku = mysqli_fetch_array($qry_cek_buku);

    if (!$dt_buku) {
        echo "<script>alert('Buku tidak ditemukan');location.href='index.php';</script>";
        exit();
    }

    // Hapus buku dari database
    $delete = mysqli_query($conn, "DELETE FROM tb_buku WHERE id = '$id'");

    if ($delete) {
        // Jika berhasil dihapus, hapus juga gambar sampul buku dari direktori
        if (!empty($dt_buku['foto_sampul'])) {
            unlink("assets/" . $dt_buku['foto_sampul']);
        }

        echo "<script>alert('Buku berhasil dihapus');location.href='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus buku');location.href='index.php';</script>";
    }
} else {
    echo "<script>alert('ID buku tidak valid');location.href='index.php';</script>";
}
?>
