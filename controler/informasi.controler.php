<?php
include "service/database.php"; // Pastikan ini membuat koneksi ke $db

// Ambil data terakhir berdasarkan id atau kolom timestamp
$keuangan = "SELECT `pemasukan`, `pengeluaran`, `dana` FROM `keuangan` ORDER BY id DESC LIMIT 1";
$resultKeuangan = mysqli_query($db, $keuangan);


if ($resultKeuangan && mysqli_num_rows($resultKeuangan) > 0) {
  $row = mysqli_fetch_assoc($resultKeuangan);

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