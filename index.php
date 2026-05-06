<?php
require_once 'config/koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Absensi Siswa</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #ddd;
        }
        h2 {
            text-align: center;
        }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            display: inline-block;
        }
        .edit { background: pink; }
        .hapus { background: pink; }
        
        
        .btn-tambah {
            color: #ff69b4; 
            text-decoration: none;
            font-weight: bold;
            margin-left: 10%; 
            display: inline-block;
            margin-bottom: 10px;
        }
        .btn-tambah:hover {
            color: #ff69b4; 
}
    </style>
</head>
<body>

<h2>Data Absensi Siswa</h2>

<!-- Tombol Tambah yang sudah diubah warnanya -->
<a href="tambah.php" class="btn-tambah">+ Daftar Kehadiran Baru</a>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $data = mysqli_query($conn, "SELECT * FROM tb_absensi");
        while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d['nama_siswa']; ?></td>
            <td><?= $d['kelas']; ?></td>
            <td><?= $d['tanggal']; ?></td>
            <td><?= $d['status']; ?></td>
            <td>
                <a class="btn edit" href="edit.php?id=<?= $d['id']; ?>">Edit</a>
                <a class="btn hapus" href="hapus.php?id=<?= $d['id']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>