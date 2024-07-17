<h2>Tambah Acara</h2>
<hr>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Acara</label>
        <input type="text" class="form-control" name="nama_acara">
    </div>
    <div class="form-group">
        <label>Tanggal</label>
        <input type="date" class="form-control" name="tanggal">
    </div>
    <div class="form-group">
        <label>Lokasi</label>
        <input type="text" class="form-control" name="lokasi">
    </div>
    <button class="btn btn-primary mt-2 w-100" name="tambah">TAMBAH</button>
</form>
<?php
include 'conn.php';
if(isset($_POST['tambah'])){
    $nama_acara=$_POST['nama_acara'];
    $tanggal=$_POST['tanggal'];
    $lokasi=$_POST['lokasi'];

    if (DateTime::createFromFormat('Y-m-d', $tanggal) !== false) {
        $sql = mysqli_query($conn, "INSERT INTO acara (nama_acara, tanggal, lokasi) VALUES ('$nama_acara', '$tanggal', '$lokasi')");
        if ($sql) {
            echo "<script>alert('Acara Berhasil Ditambahkan!')</script>";
            echo "<script>location='index.php?page=list'</script>";
        } else {
            echo "<script>alert('Gagal menambahkan acara.')</script>";
        }
    } else {
        echo "<script>alert('Format tanggal tidak valid.')</script>";
    }

    echo "<script>alert('Acara Berhasil Ditambahkan!')</script>";
    echo "<script>location='index.php?page=list'</script>";
}
?>