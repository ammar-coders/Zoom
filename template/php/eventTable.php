


<?php
if ($result && $result->num_rows > 0) {
  echo "<table border='1'>";
  echo "<tr>
          <th>No</th>
          <th>Nama Event</th>
          <th>Tanggal</th>
          <th>Deskripsi</th>
          <th style='width: 75px;'>Aksi</th>
        </tr>";
  $no = 1;
  while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . $no++ . "</td>
            <td style='width: 75px; word-wrap: break-word;'>" . htmlspecialchars($row['nama']) . "</td>
            <td>" . htmlspecialchars($row['tanggal']) . "</td>
            <td style='max-width: 100px; word-wrap: break-word;' >" . htmlspecialchars($row['Deskripsi']) . "</td>
            <td style='display: flex; flex-direction: row; justify-content: center; margin-top: 50%; transform: translatey(-50%); gap: 10px;' >
              <a href='admin.php?edit=" . $row["id"] . "' onclick='bukaPopupEdit()'>
                <i class='fa-solid fa-pen-to-square' style='color: blue; margin: 5px;'></i>
              </a>
              <form action='' method='GET'>
                <a href='admin.php?hapus=" . $row["id"] . "' onclick=\"return confirm('Yakin hapus event ini?')\" name='edit'>
                  <i class='fa-solid fa-trash' style='color: red; margin: 5px;'></i>
                </a>
              </form>
              
            </td>
          </tr>";
  }
  echo "</table>";
} else {
  echo "<center>Tidak ada event.</center>";
}