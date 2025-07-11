<?php
include "service/database.php";
session_start();

$message = "";
$result = null;

// Cek apakah admin sudah diverifikasi
if (!isset($_SESSION["is-verify"]) || $_SESSION["is-verify"] !== true) {
  header("Location: verifikasi-admin.php");
  exit();
}

// Tambah event
if (isset($_POST['tambahEvent'])) {
  $namaEvent = $_POST['eventName'] ?? '';
  $deskripsi = $_POST['description'] ?? '';
  $time = $_POST['time'] ?? '';

  if (!empty($namaEvent) && !empty($deskripsi) && !empty($time)) {
    $stmt = $db->prepare("INSERT INTO event (nama, tanggal, Deskripsi) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $namaEvent, $time, $deskripsi);
    if ($stmt->execute()) {
      $_SESSION["message"] = "Event berhasil ditambahkan!";
      header("Location: admin.php");
      exit();
    } else {
      $message = "Gagal menambah event";
    }
  } else {
    $message = "Data tidak boleh kosong";
  }
}

// Update event
if (isset($_POST['updateEvent'])) {
  $id = intval($_POST['id'] ?? 0);
  $namaEvent = $_POST['eventName'] ?? '';
  $deskripsi = $_POST['description'] ?? '';
  $time = $_POST['time'] ?? '';

  if (!empty($namaEvent) && !empty($deskripsi) && !empty($time)) {
    $stmt = $db->prepare("UPDATE event SET nama = ?, tanggal = ?, Deskripsi = ? WHERE id = ?");
    $stmt->bind_param("sssi", $namaEvent, $time, $deskripsi, $id);
    if ($stmt->execute()) {
      $_SESSION["message"] = "Event berhasil diperbarui!";
      header("Location: admin.php");
      exit();
    } else {
      $message = "Gagal memperbarui event";
    }
  } else {
    $message = "Data tidak boleh kosong";
  }
}

// Hapus event
if (isset($_GET['hapus'])) {
  $hapusId = intval($_GET['hapus']);
  $query = "DELETE FROM event WHERE id = $hapusId";
  if ($db->query($query)) {
    $_SESSION["message"] = "Event berhasil dihapus!";
    header("Location: admin.php");
    exit();
  } else {
    $message = "Gagal menghapus event";
  }
}

// Simpan keuangan
if (isset($_POST["saveFinace"])) {
  $pemasukan = is_numeric($_POST['incval']) ? (float)$_POST['incval'] : 0;
  $pengeluaran = is_numeric($_POST['expval']) ? (float)$_POST['expval'] : 0;

  $result = $db->query("SELECT * FROM keuangan ORDER BY id DESC LIMIT 1");
  $dana_sebelumnya = ($result && $result->num_rows > 0) ? $result->fetch_assoc()['dana'] : 0;
  $dana = $dana_sebelumnya + ($pemasukan - $pengeluaran);

  if ($pemasukan != "" || $pengeluaran != "") {
    $stmt = $db->prepare("INSERT INTO keuangan (pemasukan, pengeluaran, dana) VALUES (?, ?, ?)");
    $stmt->bind_param("ddd", $pemasukan, $pengeluaran, $dana);
    if ($stmt->execute()) {
      $_SESSION["message"] = "Data keuangan berhasil disimpan!";
      header("Location: admin.php");
      exit();
    } else {
      $message = "Gagal menyimpan data keuangan";
    }
  } else {
    $message = "Data pemasukan/pengeluaran tidak boleh kosong";
  }
}

// Logout admin
if (isset($_POST["keluar"])) {
  $_SESSION["is-verify"] = false;
  header("Location: index.php");
  exit();
}

// Ambil data event
$result = $db->query("SELECT * FROM event");

// Mode edit event
$editMode = false;
$eventToEdit = ['id' => '', 'nama' => '', 'tanggal' => '', 'Deskripsi' => ''];

if (isset($_GET['edit'])) {
  $editId = intval($_GET['edit']);
  $editResult = $db->query("SELECT * FROM event WHERE id = $editId");
  if ($editResult && $editResult->num_rows > 0) {
    $eventToEdit = $editResult->fetch_assoc();
    $editMode = true;
  }
}


