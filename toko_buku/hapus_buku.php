<!DOCTYPE html>
<html>
<head>
    <title>Hapus Buku</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2 style="text-align: center;">Hapus Buku</h2>
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            echo "<p>ID buku tidak valid</p>";
            echo "<a href='index.php' class='btn btn-secondary'>Kembali</a>";
            exit();
        }
        ?>

        <p>Apakah Anda yakin ingin menghapus buku ini?</p>
        <form action="proses_hapus_buku.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <button type="submit" name="hapus" class="btn btn-danger">Hapus Buku</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
