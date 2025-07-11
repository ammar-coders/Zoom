<?php
// Ambil data dari form
$client = $_POST['client'] ?? '';
$message = $_POST['message'] ?? '';
$from = $_POST['from'] ?? 'client'; // default: client
$time = date("H:i");

// Validasi input
if (!$client || !$message) {
  http_response_code(400);
  echo "Nama client dan pesan harus diisi.";
  exit;
}

// Buat folder client jika belum ada
$dir = "chat/" . basename($client); // cegah path traversal
if (!is_dir($dir)) {
  mkdir($dir, 0777, true);
}

// File penyimpanan chat
$file = "$dir/chat.json";

// Ambil data lama (jika ada)
$data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

// Tambahkan pesan baru
$data[] = [
  'from' => htmlspecialchars($from),
  'message' => htmlspecialchars($message),
  'time' => $time
];

// Simpan kembali ke file JSON
file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
?>
