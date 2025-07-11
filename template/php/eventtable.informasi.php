
<style>
    table {
        border: none;
        border-collapse: separate;  /* Important for border-radius */
        border-spacing: 0;          /* Removes space between cells */
        width: 100%;
        border-radius: 10px;        /* Apply radius to entire table */
        overflow: hidden;           /* Ensures corners clip correctly */
    }
      
    tr:nth-child(odd) {
        background-color: #f2f2f2;
    }
      
    th, td {
        padding: 10px;
        text-align: center;
        border: none;               /* Ensure no cell borders */
    }
    
    th {
        background-color: #4CAF50;
          color: white;
    }
    
    /* Optional: extra-rounded effect on specific cells */
    th:first-child {
        border-top-left-radius: 10px;
    }
    
    th:last-child {
        border-top-right-radius: 10px;
    }
    
    tr:last-child td:first-child {
        border-bottom-left-radius: 10px;
    }
    
    tr:last-child td:last-child {
        border-bottom-right-radius: 10px;
    }
</style>

<?php
include "service/database.php";

$result = $db->query("SELECT * FROM event");

if ($result && $result->num_rows > 0) {
  echo "<table border='1'>";
  echo "<tr>
          <th>No</th>
          <th>Nama Event</th>
          <th>Tanggal</th>
          <th>Deskripsi</th>
        </tr>";
  $no = 1;
  while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . $no++ . "</td>
            <td>" . htmlspecialchars($row['nama']) . "</td>
            <td>" . htmlspecialchars($row['tanggal']) . "</td>
            <td>" . htmlspecialchars($row['Deskripsi']) . "</td>
          </tr>";
  }
  echo "</table>";
} else {
  echo "<p>Tidak ada event.</p>";
}