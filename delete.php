<?php
    include "koneksi.php";
    $id = $_GET['id'];
    $ambilData = mysqli_query($koneksi, "DELETE FROM datamap WHERE id='$id'");
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/SIGPolisi/data.php'>";
?>