

<?php 
$db = mysqli_connect("localhost","root@localhost","",'db_sasirangan', 3307);

if(!$db) {
    die("Tidak bisa Terhubung = " .mysqli_connect_error());}
?>