<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <h3>Tampil Buku</h3>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>judul</th>
                <th>penulis</th>
                <th>tanggal_terbit</th>
                <th>foto_sampul</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include "koneksi.php";
            $qry_buku=mysqli_query($conn,"select * from tb_buku");
            $no=0;
            while($data_siswa=mysqli_fetch_array($qry_buku)){
            $no++;?>
            <tr>              
                <td><?=$no?></td>
                <td><?=$data_siswa['judul']?></td>
                <td><?=$data_siswa['penulis']?></td>
                <td><?=$data_siswa['tanggal_terbit']?></td> 
                <td><a href="ubah_buku.php?id=<?=$data_siswa['id']?>" class="btn btn-success">Ubah</a> | <a href="hapus_buku.php?id_siswa=<?=$data_siswa['id']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>
            </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
