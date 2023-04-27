<?php

$nr_zespolu =  $_POST['nr_zesp'];
$nr_dyspozytora =  $_POST['nr_dysp'];
$adres =  $_POST['adres'];

$polaczenie = mysqli_connect('localhost', 'root', '', 'rolnictwo');

$z_dodaj_zgloszenie = "INSERT INTO zgloszenia VALUES (null, $nr_zespolu, $nr_dyspozytora, '$adres', 0, curtime())";

$zapytanie = mysqli_query($polaczenie, $z_dodaj_zgloszenie);

mysqli_close($polaczenie);
?>
