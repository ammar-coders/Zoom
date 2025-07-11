<?php
session_start();
include "service/database.php"; // Pastikan ini membuat koneksi ke $db

// Ambil data terakhir berdasarkan id atau kolom timestamp
$query = "SELECT `pemasukan`, `pengeluaran`, `dana` FROM `keuangan` ORDER BY id DESC LIMIT 1";
$result = mysqli_query($db, $query);

if ($result && mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);

  $pemasukan = (int)$row['pemasukan'];
  $pengeluaran = (int)$row['pengeluaran'];
  $danaSebelumnya = (int)$row['dana'];

  // Dana langsung dari database
  $totalDana = $danaSebelumnya;

  function formatRupiah($angka) {
    $angka *= 1000;
    $formatted = number_format($angka, 0, '', '.');
    if ($angka === 0) {
      $formatted = "0.000";
    }
    return "Rp " . $formatted . ",--";
  }

  $pemasukanResult = formatRupiah($pemasukan);
  $pengeluaranResult = formatRupiah($pengeluaran);
  $danaResult = formatRupiah($totalDana);
}
?>