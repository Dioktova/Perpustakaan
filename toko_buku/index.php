<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2 style="text-align: center;">Daftar Buku</h2>
        <a href="tambah_buku.php" class="btn btn-primary">Tambah Buku Baru</a>
        <div class="row">
            <?php 
            include "koneksi.php";
            $qry_produk = mysqli_query($conn, "SELECT * FROM tb_buku");
            while ($dt_produk = mysqli_fetch_array($qry_produk)) {
                ?>
                <div class="col-md-3">
                    <div class="card" style="margin-top: 10px;">
                        <?php if (!empty($dt_produk['foto_sampul'])): ?>
                            <img src="assets/<?= $dt_produk['foto_sampul'] ?>" class="card-img-top">
                        <?php else: ?>
                            <img src="assets/no-image.jpg" class="card-img-top">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= $dt_produk['judul'] ?></h5>
                            <p class="card-text"><?= $dt_produk['penulis'] ?></p>
                            <p class="card-text"><?= $dt_produk['tahun_terbit'] ?></p>
                            <a href="ubah_buku.php?id=<?= $dt_produk['id'] ?>" class="btn btn-success">Ubah</a>
                            <a href="hapus_buku.php?id=<?= $dt_produk['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')" class="btn btn-danger">Hapus</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>
</html>