<?php
if ($_POST) {
    include "koneksi.php";
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun_terbit = $_POST['tahun_terbit'];
    // Periksa apakah gambar baru diunggah
    if ($_FILES['foto']['name']) {
        $rand = rand();
        $ekstensi = array('png', 'jpg', 'jpeg', 'gif');
        $filename = $_FILES['foto']['name'];
        $ukuran = $_FILES['foto']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $tempdir = "assets/";

        if (!in_array($ext, $ekstensi)) {
            echo "<script>alert('Ekstensi file yang diperbolehkan .png | .jpg | .jpeg | .gif');location.href='ubah_buku.php?id=$id';</script>";
        } else {
            if ($ukuran < 10440700) {
                $xx = $rand . '_' . $filename;
                move_uploaded_file($_FILES['foto']['tmp_name'], $tempdir . $xx);

                // Hapus gambar lama jika ada
                $qry_get_buku = mysqli_query($conn, "SELECT * FROM tb_buku WHERE id = '$id'");
                $dt_buku = mysqli_fetch_array($qry_get_buku);
                if (!empty($dt_buku['foto_sampul'])) {
                    unlink("assets/" . $dt_buku['foto_sampul']);
                }

                // Perbarui data buku termasuk foto baru
                $update = mysqli_query($conn, "UPDATE tb_buku SET judul = '$judul', penulis = '$penulis', tahun_terbit = '$tahun_terbit', foto_sampul = '$xx' WHERE id = '$id'") or die(mysqli_error($conn));

                if ($update) {
                    echo "<script>alert('Sukses update buku');location.href='index.php';</script>";
                } else {
                    echo "<script>alert('Gagal update buku');location.href='ubah_buku.php?id=$id';</script>";
                }
            } else {
                echo "<script>alert('Ukuran gambar terlalu besar');location.href='ubah_buku.php?id=$id';</script>";
            }
        }
    } else {
        // Jika tidak ada gambar baru diunggah, perbarui data buku tanpa mengubah gambar
        $update = mysqli_query($conn, "UPDATE tb_buku SET judul = '$judul', penulis = '$penulis', tahun_terbit = '$tahun_terbit' WHERE id = '$id'") or die(mysqli_error($conn));

        if ($update) {
            echo "<script>alert('Sukses update buku');location.href='index.php';</script>";
        } else {
            echo "<script>alert('Gagal update buku');location.href='ubah_buku.php?id=$id';</script>";
        }
    }
}
?>