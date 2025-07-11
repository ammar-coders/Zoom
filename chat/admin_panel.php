<?php
$admin_password = "admin123"; // Ganti dengan password admin yang kamu mau

// Tampilkan form login jika password belum dikirim
if (!isset($_POST['admin_pass']) && !isset($_GET['client'])) {
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Admin</title>
</head>
<body>
  <h2>Login Admin</h2>
  <form method="post">
    <input type="password" name="admin_pass" placeholder="Password Admin" required>
    <button type="submit">Login</button>
  </form>
</body>
</html>
<?php
  exit;
}

// Periksa password jika dikirim
if (isset($_POST['admin_pass']) && $_POST['admin_pass'] !== $admin_password) {
  die("Password salah!");
}
?>

<!DOCTYPE html>
<html>
<head>
  <?php
  $client = isset($_GET['client']) ? $_GET['client'] : 'Tidak Ada';
  ?>
  <title>Admin Panel - <?= htmlspecialchars($client) ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="icon" type="image/png" href="/zoom/assets/favicon.png">
</head>
<body>
  
  <?php if (!isset($_GET['client'])): ?>
    <h3>Daftar Client:</h3>
    <ul>
      <?php
      foreach (glob("chat/*", GLOB_ONLYDIR) as $dir) {
        $client = basename($dir);
        echo "<li><a href='?client=$client'>$client</a></li>";
      }
      ?>
    </ul>
    <?php else: ?>
      <div class="header-bar">
        <a href="/zoom/admin.php">← Kembali ke daftar client</a>
        <h2>Admin Panel</h2>
        <?php $client = basename($_GET['client']); ?>
        <h3>Chat dengan <?= htmlspecialchars($client) ?></h3>
      </div>
    

      
      <div id="chat-box" style="border:1px solid #ccc; padding:10px; overflow-y:scroll; margin-top:10px;">
        Memuat chat...
      </div>
      
      <form id="admin-chat-form">
        <input type="hidden" name="client" value="<?= htmlspecialchars($client) ?>">
        <input type="hidden" name="from" value="admin">
        <input type="text" name="message" placeholder="Balas pesan..." required>
        <button type="submit"><i class="fas fa-paper-plane"></i></button>
      </form>

      <p id="copyright"></p>

      <script>
        function loadChat() {
          fetch("get_chat.php?client=<?= urlencode($client) ?>")
            .then(res => res.text())
            .then(html => {
              document.getElementById("chat-box").innerHTML = html;
                // Scroll otomatis ke bawah
              document.getElementById("chat-box").scrollTop = document.getElementById("chat-box").scrollHeight;
            });
        }
    
        setInterval(loadChat, 1000);
        loadChat();

        document.addEventListener("DOMContentLoaded", function() {
          const form = document.getElementById("admin-chat-form");
          form.addEventListener("submit", function(e) {
            e.preventDefault(); // ⛔ Cegah submit default (yang pindah ke send.php)
            const formData = new FormData(form);
            fetch("send.php", {
                method: "POST",
                body: formData
            })
            .then(res => res.text())
            .then(() => {
                form.reset();
            loadChat();
      });
    });
  });
  
  const tahun = new Date().getFullYear();
  document.getElementById("copyright").innerHTML =
    `&copy; ${tahun} Whatsapp. All rights reserved.`;

  const bubbles = document.querySelectorAll('.bubble');
  if (bubbles.length) {
    bubbles[bubbles.length - 1].scrollIntoView({ behavior: 'smooth', block: 'end' });
  }
</script>

  <?php endif; ?>
</body>
</html>
