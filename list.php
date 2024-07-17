<h2>Acara Saya</h2>
<hr>
<form method="post">
    <div class="form-group form-inline col-md-2">
        <input type="text" class="form-control" name="cari" placeholder="Acara yang ingin dicari..."/>
        <button class="btn btn-success" name="tombol_cari">Cari</button>
    </div>
</form>
<table class="table table-bordered table-hover">
    <thead>
        <th>No</th>
        <th>Event</th>
        <th>Waktu</th>
        <th>Lokasi</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        <?php
        include 'conn.php';
        if (isset($_POST['tombol_cari'])){
            $input = $_POST['cari'];
            if ($input !=""){
                $sql=mysqli_query($conn, "SELECT * FROM acara WHERE nama_acara like '%$input'");
            }else {
                $sql=mysqli_query($conn , "SELECT * FROM acara");
            }
        } else{
            $sql=mysqli_query($conn, "SELECT * FROM acara");
        }
        $jumlahrecord=mysqli_num_rows($sql);
        if($jumlahrecord<1){
            echo"<tr>";
            echo"<td colspan='5'><center class='bg-danger text-white'>Acara tidak ditemukan</center></td>";
            echo"<tr>";
            echo"<meta http-equiv='refresh' content='2;url=index.php?page=list'>";
        }
        else{
            $nomor=1;
            while ($data=mysqli_fetch_array($sql)){
        ?>
                <tr>
                    <td><?php echo $nomor;?></td>
                    <td><?php echo $data['nama_acara'];?></td>
                    <td><?php echo $data['tanggal'];?></td>
                    <td><?php echo $data['lokasi'];?></td>
                    <td>
                        <a href="index.php?page=ubah&id=<?php echo $data['id_acara']?>" class="btn btn-info mr-2">Ubah</a>
                        <a href="index.php?page=hapus&id=<?php echo $data['id_acara']; ?>" onclick="return confirm('Yakin Dihapus??')" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php
                    $nomor++;
            }
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5">
                <a href="index.php?page=tambah" class="btn btn-primary w-100">Tambah</a>
            </td>
        </tr>
    </tfoot>
</table>