<?php
require_once 'config/koneksi.php';

$query = "SELECT * FROM tb_absensi ORDER BY id DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Absensi Siswa</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #ddd;
        }
    </style>
</head>
<body>

<h2>Data Absensi Siswa</h2>

<table>
    <tr>
        <th>No</th>
        <th>Nama Siswa</th>
        <th>Kelas</th>
        <th>Tanggal</th>
        <th>Status</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        $no = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$no}</td>
                    <td>{$row['nama_siswa']}</td>
                    <td>{$row['kelas']}</td>
                    <td>{$row['tanggal']}</td>
                    <td>{$row['status']}</td>
                  </tr>";
            $no++;
        }
    } else {
        echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
    }
    ?>
</table>

</body>
</html>