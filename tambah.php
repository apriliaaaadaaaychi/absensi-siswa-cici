<?php
require_once 'config/koneksi.php';

if (isset($_POST['simpan'])) {
    $nama   = $_POST['nama_siswa'];
    $kelas  = $_POST['kelas'];
    $tgl    = $_POST['tanggal'];
    $status = $_POST['status'];

    // SINKRON: Pakai tb_absensi dan kolom status
    $query = mysqli_query($conn, "INSERT INTO tb_absensi (nama_siswa, kelas, tanggal, status) 
                                  VALUES ('$nama', '$kelas', '$tgl', '$status')");

    if ($query) {
        header("Location: index.php");
    } else {
        echo "Gagal simpan: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Attendance</title>
    <style>
        body { font-family: sans-serif; background: #f4f7f6; display: flex; justify-content: center; padding-top: 50px; }
        .card { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 350px; }
        input, select, button { width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box; }
        button { background: #a72876; color: white; border: none; cursor: pointer; font-weight: bold; }
    </style>
</head>
<body>
    <div class="card">
        <h3>Tambah Absensi</h3>
        <form method="POST">
            <input type="text" name="nama_siswa" placeholder="Nama Siswa" required>
            <input type="text" name="kelas" placeholder="Kelas (contoh: XI PPLG 3)" required>
            <input type="date" name="tanggal" required>
            <select name="status" required>
                <option value="">-- Pilih Status --</option>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
                <option value="Alpa">Alpa</option>
            </select>
            <button type="submit" name="simpan">Simpan Data</button>
            <a href="index.php" style="display:block; text-align:center; font-size:12px; color:gray; text-decoration:none;">Batal</a>
        </form>
    </div>
</body>
</html>