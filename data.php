<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .googlemap {
            align-content: center;

        }

        .list {
            padding-left: 50px;
        }

        img {
            height: 150px;
        }

        .jumbotron{
            background-color: #DAA520;
        }
    
    </style>
</head>

<body>

    <div class="text-center" style="margin-bottom:0">
        <img src="img/polri.png" alt="">
        <p>
        <h1>Pendataan Kantor Polisi - Kota Surabaya</h1>
        </p>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="index.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="data.php">Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container" style="margin-top:30px">
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    Data Kantor Polisi
                    <a href="create.php" class="btn btn-md btn-primary float-right">Tambah Data</a>
                </div>

                <div class="card-body">
                   <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr align="center">
                            <th>NO</th>
                            <th>NAMA KANTOR POLISI</th>
                            <th>ALAMAT</th>
                            <th>LATITUDE</th>
                            <th>LONGITUDE</th>
                            <th>AKSI</th>
                        </tr>

                        <?php
                            include "koneksi.php";
                            $no =1;
                            $tampil = mysqli_query($koneksi, "SELECT * FROM datamap");
                            if (isset($_GET['cari'])) {
                                $tampil = mysqli_query($koneksi, "SELECT * FROM datamap WHERE nama_polisi LIKE '%".$_GET['cari']."%'");
                            }
                            while($data=mysqli_fetch_array($tampil))
                            {
                        ?>
                        <tr>
                            <td> <?php echo $no++; ?> </td>
                            <td> <?php echo $data['nama_polisi']; ?> </td>
                            <td> <?php echo $data['alamat']; ?> </td>
                            <td> <?php echo $data['latitude']; ?> </td>
                            <td> <?php echo $data['longitude']; ?> </td>
                            <td>
                                <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-primary">edit</a> |
                                <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                        
                        <?php } ?>
                        
                    </table>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>

    <div class="jumbotron text-center" style="margin-bottom:0">
        <p><b>Created By Kelompok 4 SIG</b></p>
        <p><b>Viery , Kartika, Clarisa</b></p>
    </div>

</body>

</html>