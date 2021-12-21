<!DOCTYPE html>
<html lang="en">
<head>
  <title>SIG Kantor Polisi Di Surabaya</title>
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
  
  img{
    height: 150px;
  }

  .jumbotron{
    background-color: #DAA520;
  }
  </style>

  <!-- Script Maps -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjZKfHC-1ECLYmReC2BeiQFmPwIbAWK3I&callback=initialize" async defer></script>
<script type="text/javascript">
    var marker;
    function initialize(){
        // Variabel untuk menyimpan informasi lokasi
        var infoWindow = new google.maps.InfoWindow;
        //  Variabel berisi properti tipe peta
        var mapOptions = {
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        // Pembuatan peta
        var peta = new google.maps.Map(document.getElementById('googleMap'), mapOptions);
        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();
        // Pengambilan data dari database MySQL
        <?php
          include 'koneksi.php';

          $query = $koneksi->query("SELECT * FROM datamap ORDER BY nama_polisi ASC");
          while ($row = $query->fetch_assoc()) {
            $nama = $row["nama_polisi"];
            $lat = $row["latitude"];
            $long = $row["longitude"];
            echo "addMarker($lat, $long, '$nama');\n";
          }
        ?>

                // Proses membuat marker
                function addMarker(lat, lng, info){
                    var lokasi = new google.maps.LatLng(lat, lng);
                    bounds.extend(lokasi);
                    var marker = new google.maps.Marker({
                        map: peta,
                        position: lokasi
                    });
                    peta.fitBounds(bounds);
                    bindInfoWindow(marker, peta, infoWindow, info);
                 }
                // Menampilkan informasi pada masing-masing marker yang diklik
                function bindInfoWindow(marker, peta, infoWindow, html){
                    google.maps.event.addListener(marker, 'click', function() {
                    infoWindow.setContent(html);
                    infoWindow.open(peta, marker);
                  });
                }
            }
        </script>
        <!-- End Script Maps -->


</head>
<body>

<div class="text-center" style="margin-bottom:0">
  <img src="img/polri.png" alt="">
  <p><h1>Pendataan Kantor Polisi - Kota Surabaya</h1></p>
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
  <div class="row">
    <div class="col-sm-4">
      
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a style="text-align: center;" href="data.php" class="nav-link active">DATA MARKER</a>
        </li>
        <li class="nav-item">
          <!-- mengambil data -->
          <p></p>
          <?php 
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi,"SELECT * FROM datamap");
            while($list = mysqli_fetch_array($data)){
          ?>
            <div class="text">
              <tr>
                
                <p><b><?php echo $no++; ?>. <?php echo $list['nama_polisi']; ?></b></p>
                <p><?php echo $list['alamat'] ?></p>
              </tr>
            <?php
            }
            ?>
            </div>
            
        </li>
      </ul>
      <hr class="d-sm-none">
    </div>
    <div class="col-sm-8">
      <div li class=" nav-pills flex-column">
        <a style="text-align: center;" class="nav-link active">PETA & MARKER</a>
      </div>
      <p></p>
      
      <div class="googlemap" id="googleMap" style="width:100%;height:500px;"></div>

    </div>
  </div>
</div>

<div class="jumbotron text-center" style="margin-bottom:0 ">
  <p><b>Created By Kelompok 4 SIG</b></p>
  <p><b>Viery , Kartika, Clarisa</b></p>
</div>

</body>
</html>