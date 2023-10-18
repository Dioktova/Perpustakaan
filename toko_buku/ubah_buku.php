<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Ubah Buku</title>
</head>
<body>
    <?php 
    include "koneksi.php";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $qry_get_buku = mysqli_query($conn, "SELECT * FROM tb_buku WHERE id = '$id'");
        $dt_buku = mysqli_fetch_array($qry_get_buku);
    } else {
        echo "<script>alert('ID buku tidak valid');location.href='index.php';</script>";
        exit();
    }
    ?>

    <h2>Ubah Buku</h2>
    <form action="proses_ubah_buku.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">
        Judul:
        <input type="text" name="judul" value="<?= isset($dt_buku['judul']) ? $dt_buku['judul'] : '' ?>" class="form-control">
        Penulis:
        <input type="text" name="penulis" value="<?= isset($dt_buku['penulis']) ? $dt_buku['penulis'] : '' ?>" class="form-control">
        Tahun Terbit:
        <input type="text" name="tahun_terbit" value="<?= isset($dt_buku['tahun_terbit']) ? $dt_buku['tahun_terbit'] : '' ?>" class="form-control">
        Foto Sampul:
        <input type="file" name="foto">
        <?php if (isset($dt_buku['foto_sampul'])): ?>
            <p>Foto Sampul Sekarang: <img src="assets/<?= $dt_buku['foto_sampul'] ?>" style="max-width: 200px;"></p>
        <?php endif; ?>
        <input type="submit" name="simpan" value="Ubah Buku" class="btn btn-primary">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
