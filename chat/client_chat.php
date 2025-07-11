<?php
$client = $_GET['client'] ?? '';
if (!$client) { die("Nama client diperlukan."); }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Client Chat</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="icon" type="image/png" href="/zoom/assets/favicon.png">
</head>
<body>
  <div class="header-bar">
    <a href="/zoom/">← Kembali ke beranda</a>
    <h2>Chat dengan Admin</h2>
    <h3>Tanya apapun</h3>
  </div>


  <div id="chat-box" style="border:1px solid #ccc; padding:10px; overflow-y:scroll;">Memuat chat...</div>
  
  <form id="chat-form">
    <input type="hidden" name="client" value="<?= htmlspecialchars($client) ?>">
    <input type="text" name="message" placeholder="Ketik pesan..." required>
    <button type="submit"><i class="fas fa-paper-plane"></i></button>
  </form>

  <p id="copyright"></p>

  <script>
    function loadChat() {
      fetch("get_chat.php?client=<?= urlencode($client) ?>")
        .then(res => res.text())
        .then(html => document.getElementById("chat-box").innerHTML = html);
    }

    setInterval(loadChat, 1000);
    loadChat();

    document.getElementById("chat-form").addEventListener("submit", function(e) {
      e.preventDefault();
      const form = new FormData(this);
      fetch("send.php", { method: "POST", body: form })
        .then(() => { this.reset(); loadChat(); });
    });

    const tahun = new Date().getFullYear();
    document.getElementById("copyright").innerHTML =
    `&copy; ${tahun} Whatsapp. All rights reserved.`;

    const bubbles = document.querySelectorAll('.bubble');
    if (bubbles.length) {
      bubbles[bubbles.length - 1].scrollIntoView({ behavior: 'smooth', block: 'end' });
    }   
  </script>
</body>
</html>
