<?php

include "db.php";
// Fetch events
$sql = "SELECT * FROM acara";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Event</title>
</head>
<body>
    <h1>Daftar Event</h1>
    <a href="tambah_event.php">Tambah Event</a>
    <table border="1">
        <tr>
            <th>Nama Event</th>
            <th>Tanggal</th>
            <th>Lokasi</th>
            <th>Aksi</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["nama_event"]."</td>
                        <td>".$row["tanggal"]."</td>
                        <td>".$row["lokasi"]."</td>
                        <td>
                            <a href='edit_event.php?id=".$row["id_event"]."'>Edit</a> |
                            <a href='hapus_event.php?id=".$row["id_event"]."'>Hapus</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
        }
        ?>
    </table>
</body>
</html>

