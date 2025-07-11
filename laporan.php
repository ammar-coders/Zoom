<?php
include "controler/laporan.controler.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/public.css">
    <link rel="stylesheet" href="css/laporan.css">
    <title>Lapor</title>
</head>
<body>
    <div class="container">
        <h1>Lapor</h1>
        <form action="laporan.php" method="POST">
            <label for="content">Masukan is laporan:</label>
            <input type="text" name="content" id="content input">
            <label for="date">Masukan tanggal:</label>
            <input type="datetime-local" name="date" id="date input">
            <button name="lapor">!</button>
        </form>
    </div>
</body>
</html>