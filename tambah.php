<?php
require_once 'config/koneksi.php';

if (isset($_POST['simpan'])) {
    // Menggunakan real_escape_string agar lebih aman dari SQL Injection sederhana
    $nama   = mysqli_real_escape_string($conn, $_POST['nama_siswa']);
    $kelas  = mysqli_real_escape_string($conn, $_POST['kelas']);
    $tgl    = $_POST['tanggal'];
    $status = $_POST['status'];

    $query = mysqli_query($conn, "INSERT INTO tb_absensi (nama_siswa, kelas, tanggal, status) 
                                  VALUES ('$nama', '$kelas', '$tgl', '$status')");

    if ($query) {
        header("Location: index.php");
    } else {
        echo "<script>alert('Gagal simpan: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Absensi - Modern UI</title>
    <style>
        * { box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; 
            background: #f0f2f5; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh;
            margin: 0;
        }

        .card { 
            background: white; 
            padding: 40px; 
            border-radius: 16px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.08); 
            width: 100%;
            max-width: 400px; 
        }

        h3 { 
            text-align: center; 
            color: #1a202c; 
            margin-top: 0;
            margin-bottom: 25px;
            font-size: 24px;
        }

        label {
            font-size: 14px;
            font-weight: 600;
            color: #4a5568;
            display: block;
            margin-bottom: 5px;
            margin-left: 2px;
        }

        input, select { 
            width: 100%; 
            padding: 12px 15px; 
            margin-bottom: 20px; 
            border: 1.5px solid #e2e8f0;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s ease;
            outline: none;
        }

        input:focus, select:focus {
            border-color: #38a169;
            box-shadow: 0 0 0 3px rgba(56, 161, 105, 0.1);
        }

        button { 
            width: 100%; 
            padding: 12px; 
            background: #38a169; 
            color: white; 
            border: none; 
            border-radius: 8px;
            cursor: pointer; 
            font-size: 16px;
            font-weight: bold; 
            transition: background 0.3s ease;
            margin-top: 10px;
        }

        button:hover { 
            background: #2f855a; 
        }

        .btn-batal {
            display: block; 
            text-align: center; 
            margin-top: 15px;
            font-size: 14px; 
            color: #718096; 
            text-decoration: none;
            transition: color 0.2s;
        }

        .btn-batal:hover {
            color: #2d3748;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="card">
        <h3>Tambah Absensi</h3>
        <form method="POST">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_siswa" placeholder="Masukkan nama siswa" required>
            
            <label>Kelas</label>
            <input type="text" name="kelas" placeholder="Contoh: XI PPLG 2" required>
            
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="<?= date('Y-m-d'); ?>" required>
            
            <label>Status Kehadiran</label>
            <select name="status" required>
                <option value="" disabled selected>-- Pilih Status --</option>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
                <option value="Alpa">Alpa</option>
            </select>
            
            <button type="submit" name="simpan">Simpan Data</button>
            <a href="index.php" class="btn-batal">Kembali ke Daftar</a>
        </form>
    </div>

</body>
</html>