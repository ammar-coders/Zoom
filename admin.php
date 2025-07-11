<?php
  include "controler/admin.controler.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin</title>
  <meta http-equiv="refresh" content="60">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/public.css">
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link rel="icon" type="image/png" href="assets/favicon.png">
</head>

<body>
  <header>
    <?php include "./component/nav.php" ?>
  </header>

  <main>
    <div class="title">
      <h1 class="main-tittle">Edit</h1>
      <p>Jangan lupa save agar tersimpan</p>
      <form action="admin.php" method="post" style="display:inline;">
        <button type="submit" name="keluar" class="logout-button">
          <i class="fa-solid fa-right-from-bracket"></i>
        </button>
      </form>
    </div>

    <!-- Bagian Keuangan dan Event -->
    <div class="row">
      <div class="finace">
        <h3>Keuangan:</h3>
        <form action="admin.php" method="post">
          <div class="expenditure-income">
            <div class="income">
              <h3>Pemasukan</h3>
              <input type="number" id="incval" name="incval" placeholder="0.000" value="0" required autocomplete="off">
            </div>
            <div class="expenditure">
              <h3>Pengeluaran</h3>
              <input type="number" id="expval" name="expval" placeholder="0.000" value="0" required autocomplete="off">
            </div>
            <div class="button-container">
              <button type="submit" name="saveFinace" class="save">
                <i class="fa-solid fa-pen-to-square"></i>
              </button>
            </div>  
          </div>
        </form>
      </div>
      <div class="clock">
        <div class="clock-wraper">
          <h1 id="clock"></h1>
        </div>
      </div>
    </div>

    <div class="event card">
      <h3>Event:</h3>
      <button class="tambah-event" onclick="bukaPopupTambah()">+</button>
      <?php include "template/php/eventTable.php"; ?>
    </div>

    <div class="overlay" id="overlay1"></div>
    <div class="overlay" id="overlay2"></div>

    <!-- Form Tambah/Edit Event -->
    <div class="pop-up" id="popup-tambah">
      <form action="admin.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($eventToEdit['id']); ?>">
        <h3 style="text-align: center;">Tambah Event</h3>
        <div class="input-field">
          <label for="eventName" style="width: 40%;">Nama:</label>
          <input type="text" id="eventName" name="eventName" required>
        </div>
        <div class="input-field">
          <label for="time" style="width: 40px;">Waktu:</label>
          <input style="margin-left: 27px; width: 173px;" type="datetime-local" name="time" id="time" required>
        </div>
        <div class="input-field">
          <label for="description" style="width: 40%;">Deskripsi:</label>
          <textarea name="description" id="description"></textarea>
        </div>
        <div class="popup-buttons">
          <button type="button" onclick="tutupPopupTambah()" id="tutup-tambah">Tutup</button>
          <button type="submit" name="tambahEvent" id="buka">Tambah</button>
        </div>
      </form>
    </div>

    <style>
      

    </style>

    <div class="laporan card">
      <h3>Laporan: </h3>
      <br>
      <?php include'template/php/laporanTabel.php'; ?>
    </div>

    <div class="chatpanel card">
      <h3>Chat dengan Jamaah: </h3>
      <br>
      <ul>
        <?php
        $dirs = glob("chat/chat/*", GLOB_ONLYDIR);
        date_default_timezone_set("Asia/Jakarta"); // Pastikan zona waktu sesuai
        foreach ($dirs as $dir) {
          $basename = basename($dir);
          $chatFile = "$dir/chat.json";
          if (!file_exists($chatFile)) continue;
        
          $lastModified = filemtime($chatFile);
          $now = time();
          $diffMinutes = ($now - $lastModified) / 60;
        
          // Jika modifikasi dalam 5 menit terakhir, anggap online
          $status = ($diffMinutes <= 1) ? "online" : "offline";
        
          // Warna indikator
          $color = ($status === "online") ? "#00ee00" : "#ee0000";
        
          echo "<li style='display: flex; align-items: center; gap: 8px;'>
            <i class='fa-solid fa-user'></i>
            <a href='chat/admin_panel.php?client=$basename'>$basename</a>
            <i class='fa-solid fa-circle indicator' style='color: $color; font-size: 0.0001em;' title='$status'></i>
          </li>";
        }
        ?>
        </ul>
    </div>
  </main>

  <footer>
    <?php include "component/footer.php" ?>
  </footer>

  <script src="js/admin.js"></script>
  <script src="js/clock.js"></script>
</body>
</html>
