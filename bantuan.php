<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bantuan.css">
    <link rel="stylesheet" href="css/public.css">
    <link rel="icon" type="image/png" href="assets/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Bantuan</title>
</head>
<body>
    <div class="container">
        <h2>bantuan</h2>
        <div class="button">
            <a href="laporan.php" class="laporan">!</a>
            <a href="chat/client_chat.php" class="tanya"><i class="fa-solid fa-comment"></i></a>
            <div id="form-chat" style="display: none; margin-top: 10px;">
          <form action="chat/client_chat.php" method="get">
            <label for="client-name">Masukkan Nama Anda:</label>
            <input type="text" name="client" id="client-name" required placeholder="Nama lengkap">
            <button type="submit">Mulai Chat</button>
          </form>
        </div>
        
        <script>
          document.querySelector(".tanya").addEventListener("click", function(e) {
            e.preventDefault(); // cegah link langsung ke file
            document.getElementById("form-chat").style.display = "block";
          });
        </script>
        </div>
    </div>
</body>
</html>