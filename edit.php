<?php
require_once 'config/koneksi.php';

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM tb_absensi WHERE id='$id'");
$data = $result->fetch_assoc();

$keterangan = isset($data['keterangan']) ? $data['keterangan'] : '';

if (isset($_POST['update'])) {
    $nama = $_POST['nama_siswa'];
    $ket  = $_POST['keterangan'];
    $tgl  = $_POST['tanggal'];

    $query = "UPDATE tb_absensi SET
          nama_siswa='$nama',
          status='$ket',
          tanggal='$tgl'
          WHERE id='$id'";

    if ($conn->query($query)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal update";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
        }
        .container {
            width: 400px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }
        button {
            margin-top: 15px;
            padding: 10px;
            width: 100%;
            background: #a7288c;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background: #88216e;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Data</h2>

    <form method="POST">
        Nama:
        <input type="text" name="nama_siswa" value="<?= $data['nama_siswa']; ?>">

        Keterangan:
        <select name="keterangan">
            <option value="Hadir" <?= ($keterangan == 'Hadir') ? 'selected' : '' ?>>Hadir</option>
            <option value="Izin" <?= ($keterangan == 'Izin') ? 'selected' : '' ?>>Izin</option>
            <option value="Sakit" <?= ($keterangan == 'Sakit') ? 'selected' : '' ?>>Sakit</option>
        </select>

        Tanggal:
        <input type="date" name="tanggal" value="<?= $data['tanggal']; ?>">

        <button type="submit" name="update">Update</button>
    </form>
</div>

</body>
</html>