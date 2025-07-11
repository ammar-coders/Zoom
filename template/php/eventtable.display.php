<?php
include "service/database.php";
date_default_timezone_set("Asia/Jakarta");

$now = date("Y-m-d H:i:s");
$query = "SELECT * FROM event WHERE tanggal >= '$now' ORDER BY tanggal ASC LIMIT 1";
$result = mysqli_query($db, $query);

$eventHtml = "";

if ($result && $result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $nama = htmlspecialchars($row["nama"]);
  $tanggal = htmlspecialchars($row["tanggal"]);
  $deskripsi = htmlspecialchars($row["Deskripsi"]);

  $eventHtml = '
  <style>
    #event-info {
      background-color: #f9f9f9;
      padding: 15px;
      margin: 10px 0;
      border-radius: 8px;
      box-shadow: 0 1px 4px rgba(0,0,0,0.1);
      font-family: sans-serif;
      color: #222;
      max-width: 600px;
    }
    #event-info h2 {
      margin: 0 0 10px;
      font-size: 22px;
      font-weight: 600;
    }
    #event-info p {
      margin: 5px 0;
      font-size: 16px;
    }
    #event-info h3 {
      margin-top: 15px;
      font-size: 18px;
      font-weight: normal;
    }
    #countdown {
      font-weight: bold;
      font-size: 20px;
    }
    #nama {
      text-align: center;
    }
  </style>

  <div id="event-info">
    <h1 id="nama">' . $nama . '</h1>
    <p id="des">' . $deskripsi . '</p>
    <p id="waktu">Waktu Mulai: <span id="event-time">' . $tanggal . '</span></p>
    <h3 id="status-waktu">Sisa waktu: <span id="countdown"></span></h3>
  </div>

  <script>
    const eventTimeText = document.getElementById("event-time");
    const countdownDisplay = document.getElementById("countdown");
    const statusWaktu = document.getElementById("status-waktu");

    const namaEl = document.getElementById("nama");
    const desEl = document.getElementById("des");
    const waktuEl = document.getElementById("waktu");

    if (eventTimeText && countdownDisplay) {
      const eventTime = new Date(eventTimeText.innerText).getTime();

      const updateCountdown = () => {
        const now = new Date().getTime();
        const distance = eventTime - now;

        if (distance <= 0) {
          // Sembunyikan elemen dan ubah seluruh pesan
          if (namaEl) namaEl.style.display = "none";
          if (desEl) desEl.style.display = "none";
          if (waktuEl) waktuEl.style.display = "none";
          if (statusWaktu) statusWaktu.innerText = "Event sedang berlangsung";
          return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        countdownDisplay.innerText =
          (days > 0 ? days + "h " : "") +
          (hours < 10 ? "0" : "") + hours + "j " +
          (minutes < 10 ? "0" : "") + minutes + "m " +
          (seconds < 10 ? "0" : "") + seconds + "d";
      };

      updateCountdown();
      setInterval(updateCountdown, 1000);
    }
  </script>';
} else {
  $eventHtml = '
    <style>
      .no-event {
        font-family: sans-serif;
        color: #666;
        font-size: 16px;
        margin: 10px 0;
        text-align: center;
      }
    </style>
    <div class="no-event">Tidak ada event.</div>';
}
?>
