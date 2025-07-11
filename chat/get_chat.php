<link rel="stylesheet" href="/zoom/css/chat.css">

<?php
$client = $_GET['client'] ?? '';
$file = "chat/" . basename($client) . "/chat.json";

if (!$client || !file_exists($file)) {
  echo "<p>Belum ada chat.</p>";
  exit;
}

$data = json_decode(file_get_contents($file), true);
foreach ($data as $msg) {
  $from = htmlspecialchars($msg['from']);
  $message = htmlspecialchars($msg['message']);
  $time = htmlspecialchars($msg['time']);
  $class = $from === 'admin' ? 'bubble admin' : 'bubble client';

  echo "<div class='$class'>
          <strong>$from: </strong>
          <div class='msg'> $message</div>
          <div class='time'>$time</div>
        </div>";
}
?>
