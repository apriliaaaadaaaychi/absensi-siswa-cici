<?php
require_once 'config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Absensi Siswa</title>
    <style>
        /* Reset & Base Style */
        * { box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Tombol Tambah */
        .btn-tambah {
            display: inline-block;
            background-color: #27ae60;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }
        .btn-tambah:hover {
            background-color: #219150;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(39, 174, 96, 0.3);
        }

        /* Tabel Modern */
        table {
            border-collapse: collapse;
            width: 100%;
            overflow: hidden;
            border-radius: 8px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        thead {
            background-color: #2c3e50;
            color: white;
        }

        tbody tr:hover {
            background-color: #f9f9f9;
        }

        /* Badge Status */
        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85em;
            font-weight: bold;
            background: #e0e0e0;
        }

        /* Tombol Aksi */
        .btn {
            padding: 8px 15px;
            text-decoration: none;
            color: white;
            border-radius: 6px;
            font-size: 14px;
            margin: 0 2px;
            transition: opacity 0.2s;
        }
        .edit { background-color: #3498db; }
        .hapus { background-color: #e74c3c; }
        .btn:hover { opacity: 0.8; }

    </style>
</head>
<body>

<div class="container">
    <h2>Daftar Absensi Siswa</h2>

    <a href="tambah.php" class="btn-tambah">+ Tambah Kehadiran</a>

    <table>
        <thead>
            <tr>
                <th style="width: 50px; text-align: center;">No</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th style="text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $data = mysqli_query($conn, "SELECT * FROM tb_absensi ORDER BY id DESC");
            while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td style="text-align: center;"><?= $no++; ?></td>
                <td><strong><?= htmlspecialchars($d['nama_siswa']); ?></strong></td>
                <td><?= htmlspecialchars($d['kelas']); ?></td>
                <td><?= date('d M Y', strtotime($d['tanggal'])); ?></td>
                <td>
                    <span class="status-badge"><?= htmlspecialchars($d['status']); ?></span>
                </td>
                <td style="text-align: center;">
                    <a class="btn edit" href="edit.php?id=<?= $d['id']; ?>">Edit</a>
                    <a class="btn hapus" href="hapus.php?id=<?= $d['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>