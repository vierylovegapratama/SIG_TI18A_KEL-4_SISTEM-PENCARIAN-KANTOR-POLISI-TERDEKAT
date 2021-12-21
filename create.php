<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
    <div class="container" style="margin-top:30px">
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah Data Kantor Polisi</div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <div class="form-row">     
                                <div class="col">
                                    <label for="">Nama Kantor Polisi</label>
                                    <input type="text" name="nama_polisi" class="form-control" placeholder="Tambahkan Nama Kantor Polisi">
                                </div>
                                <div class="col">
                                    <label for="">Alamat Lengkap</label>
                                    <input type="text" name="alamat" class="form-control" placeholder="Tambahkan Alamat">
                                </div>
                                <div class="col">
                                    <label for="">Latitude</label>
                                    <input type="text" name="latitude" class="form-control" placeholder="Tambahkan Latitude">
                                </div>
                                <div class="col">
                                    <label for="">Longitude</label>
                                    <input type="text" name="longitude" class="form-control" placeholder="Tambahkan Longitude">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="form-row float-right">
                                <div class="col">
                                    <button type="submit" name="simpan" class="btn btn.md btn-primary">SIMPAN</button>
                                    <a href="data.php" class="btn btn-md btn-danger">BATAL</a>
                                </div>
                            </div>
                        </div>
                    </form>

                    <?php

                        include "koneksi.php";
                        if(isset($_POST['simpan']))
                        {
                            $nama_polisi    = $_POST['nama_polisi'];
                            $alamat         = $_POST['alamat'];
                            $latitude       = $_POST['latitude'];
                            $longitude      = $_POST['longitude'];

                            $insert=mysqli_query($koneksi, "INSERT INTO datamap VALUES('','$nama_polisi', '$alamat', '$latitude','$longitude')");
                            if($insert)
                            {
                                echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang Disimpan...</h5></div>";
                                echo "<meta http-equiv='refresh' content='1;url=http://localhost/SIGPolisi/data.php'>";
                            }else{
                                echo "Gagal upload";
                            }

                        }
                    ?>
                    

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>