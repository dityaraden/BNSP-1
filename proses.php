<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "beasiswa");

$ipk = isset($_SESSION['ipk']) ? $_SESSION['ipk'] : '';
unset($_SESSION['ipk']);

if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['daftar'])) {
     $nama = $_POST['nama'];
     $jenis_kelamin = $_POST['jenis_kelamin'];
     $email = $_POST['email'];
     $nomor_hp = $_POST['nomor_hp'];
     $semester = $_POST['semester'];
     $beasiswa = $_POST['beasiswa'];

     $_SESSION['ipk'] = $ipk;
     $uploadDirectory = "uploads/";

     if (!file_exists($uploadDirectory)) {
          mkdir($uploadDirectory, 0777, true);
     }
     $berkas_path = $uploadDirectory . basename($_FILES['berkas']['name']);
     move_uploaded_file($_FILES['berkas']['tmp_name'], $berkas_path);

     if ($ipk >= 3) {
          $status_ajuan = 'belum di verifikasi';
     } else {
          $status_ajuan = 'Tidak memenuhi syarat';
     }

     $sql = "INSERT INTO mahasiswa (nama, jenis_kelamin, email, nomor_hp, semester, ipk, berkas_path, pil_beasiswa, status_ajuan)
            VALUES (?, ?, ?,?, ?, ?, ?, ?, ?)";

     $stmt = mysqli_prepare($conn, $sql);
     mysqli_stmt_bind_param($stmt, "ssssdssss", $nama, $jenis_kelamin, $email, $nomor_hp, $semester, $ipk, $berkas_path, $beasiswa, $status_ajuan);

     if (mysqli_stmt_execute($stmt)) {
          header("Location: hasil.php");
          exit(); // Add exit to stop further execution
     } else {
          echo "Error: " . mysqli_stmt_error($stmt); // Use mysqli_stmt_error instead of mysqli_error
     }

     mysqli_stmt_close($stmt);
}

mysqli_close($conn);
