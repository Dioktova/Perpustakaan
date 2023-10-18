<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2 style="text-align: center;">Tambah Buku</h2>
        <form action="proses_tambah_buku.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Judul Buku :</label>
                <input type="text" class="form-control" placeholder="Masukkan Judul Buku" name="judul" required="required">
            </div>
            <div class="form-group">
                <label>Penulis :</label>
                <input type="text" class="form-control" placeholder="Masukkan Nama Penulis" name="penulis" required="required">
            </div>
            <div class="form-group">
                <label>Tahun Terbit :</label>
                <input type="text" class="form-control" placeholder="Masukkan Tahun Terbit" name="tahun_terbit" required="required">
            </div>
            <div class="form-group">
                <label>Foto Sampul :</label>
                <input type="file" name="foto" required="required">
                <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
            </div>
            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
        </form>
    </div>
</body>
</html>
