<?php
if ($_POST) {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun_terbit = $_POST['tahun_terbit'];

    // Validasi ekstensi gambar yang diperbolehkan
    $rand = rand();
    $ekstensi = array('png', 'jpg', 'jpeg', 'gif');
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $tempdir = "assets/";

    if (!in_array($ext, $ekstensi)) {
        header("location:tambah_buku.php?alert=gagal_ekstensi");
    } else {
        if ($ukuran < 10440700) {
            $xx = $rand . '_' . $filename;
            move_uploaded_file($_FILES['foto']['tmp_name'], $tempdir . $xx);
            
            include "koneksi.php";
            $insert = mysqli_query($conn, "INSERT INTO tb_buku (judul, penulis, tahun_terbit, foto_sampul) VALUES ('$judul', '$penulis', '$tahun_terbit', '$xx')");
            
            if ($insert) {
                header("location:index.php?alert=berhasil");
            } else {
                header("location:tambah_buku.php?alert=gagal");
            }
        } else {
            header("location:tambah_buku.php?alert=gagal_ukuran");
        }
    }
}
?>