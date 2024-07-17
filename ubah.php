<h2>Ubah Acara</h2>
<hr>
<?php
    include 'conn.php';
    $id=mysqli_query($conn, "SELECT * FROM acara where id_acara='$_GET[id]'");
    $data=mysqli_fetch_assoc($id);
?>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Acara</label>
        <input type="text" name="nama_acara" class="form-control" value="<?php echo $data['nama_acara']?>">
    </div>
    <div class="form-group">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="<?php echo $data['tanggal']?>">
    </div>
    <div class="form-group">
        <label>Lokasi</label>
        <input type="text" name="lokasi" class="form-control" value="<?php echo $data['lokasi']?>">
    </div>
    <button class=" btn btn-primary w-100" name="ubah_acara">UBAH ACARA</button>
</form>
<?php
if(isset($_POST['ubah_acara'])){
    $nama_acara=$_POST['nama_acara'];
    $tanggal=$_POST['tanggal'];
    $lokasi=$_POST['lokasi'];

    if (DateTime::createFromFormat('Y-m-d', $tanggal) !== false) {
        $sql=mysqli_query($conn, "UPDATE acara SET nama_acara='$nama_acara', tanggal='$tanggal', lokasi='$lokasi' WHERE id_acara='$_GET[id]'");
        if ($sql) {
            echo "<script>alert('Data Acara Berhasil Di Ubah')</script>";
            echo "<script>location='index.php?page=list';</script>";
        } else {
            echo "<script>alert('Gagal mengubah acara.')</script>";
        }
    } else {
        echo "<script>alert('Format tanggal tidak valid.')</script>";
    }

    

    
    
}
?>