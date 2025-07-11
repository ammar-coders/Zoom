<?php
include "controler/laporan.controler.php";
// Query
$query = "SELECT * FROM laporan where selesai = 0 ORDER BY id DESC LIMIT 10";
$result = mysqli_query($db, $query);
if ($result && mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    echo "<tr>
            <th>No</th>
            <th>Isi</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>";
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["selesai"] == true) {
            continue;
        }else {
            echo "<tr>
                <td>" . $no++ . "</td>
                <td style='width: calc(100% - 500px - 300px - 150px) word-wrap: break-word;'>" . htmlspecialchars($row['isi']) . "</td>
                <td style='width: 50px; word-wrap: break-word;'>" . htmlspecialchars($row['tanggal']) . "</td>
                <td>
                  <div style='display: flex; flex-direction: row; justify-content: center; gap:20px;'>
                    <form action='admin.php?done=" . $row["id"] . "' method='post'>
                        <button type='submit' name='selesai'>
                            <i class='fa-solid fa-check' style='color: green;'></i>
                        </button>
                    </form>
                    <form action='admin.php?delete=" . $row["id"] . "' method='post'>
                        <button type='submit' name='hapus'> 
                            <i class='fa-solid fa-x' style='color: red;'></i>
                        </button>
                    </form>
                  </div>
                </td>
              </tr>";
        }
    }
    echo "</table>";
} else {
    echo "<center>Tidak ada laporan.</center>";
}

?>
