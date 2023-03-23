<?php

$do_bazy = mysqli_connect('localhost', 'root', '', 'znajomi');
if($do_bazy) {
    echo "Nawiązano połączenie<br>";

    $imie = $_POST['im'];
    $nazwisko = $_POST['nazw'];
    $data_ur = $_POST['data'];
    $wiek = $_POST['wiek'];

    $z_dodaj_znajomego = "INSERT INTO osoby VALUES (null, '$imie', '$nazwisko', '$data_ur', $wiek)";
    $wynik1 = mysqli_query($do_bazy, $z_dodaj_znajomego);

    echo "Dodano do znajomych ".mysqli_affected_rows($do_bazy)." osobę/osoby";

} else {
    echo "Nie udało się nawiązać połączenia<br>";
}

?>
