<div class="container">
    <div class="row text-center mt-4">
        <div class="col-md-12">
            <h2 class="text-danger mt-4 mb-4">Login Admin</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary">
                    <strong>Masukkan username dan password</strong>
                </div>
                <div class="card-body">
                    <form role="form" method="post">
                        <br>
                        <div class="form-group input-group">
                            <span class="input-group-addon"></span>
                            <input type="text" name="user" class="form-control">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"></span>
                            <input type="password" name="pw" class="form-control">
                        </div>
                        <button class="btn btn-success w-100 font-weight-bold" name="login">LOGIN</button>
                    </form>
                    <?php
                    if(isset($_POST['login'])){
                        $opr=mysqli_real_escape_string($conn, $_POST['user']);
                        $pwd=mysqli_real_escape_string($conn, $_POST['pw']);
                        $enkripsi=hash('sha1', $pwd);
                        $sql=mysqli_query($conn, "SELECT * FROM operator nama_opr='$opr' and password='$enkripsi'");
                    }
                    $jumlahrecord=mysqli_num_rows($sql);
                    if($jumlahrecord==1){
                        $_SESSION['operator']=mysqli_fetch_assoc($sql);
                        echo "";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>