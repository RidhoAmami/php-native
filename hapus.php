<?php
include 'conn.php';
    $sql=mysqli_query($conn, "DELETE from acara WHERE id_acara='$_GET[id]'");
    echo "<script>alert('Acara Berhasil Dihapus!')</script>";
    echo "<script>location='index.php?page=list'</script>";