<?php

$do_bazy = mysqli_connect('localhost', 'root', '', 'znajomi');
if($do_bazy) {
    echo "Nawiązano połączenie<br>";
} else {
    echo "Nie udało się nawiązać połączenia<br>";
}

// cw1. Wstaw do tabeli osoby informacje o sobie (date urodzenia można wpisać dowolną)
$zapyt1 = "INSERT INTO osoby VALUES (null, 'Jakub', 'Nowak', '2004-07-02', 18)";
$wynik1 = mysqli_query($do_bazy, $zapyt1);

echo "Poprawnie dodano ".mysqli_affected_rows($do_bazy)." rekord/rekordów";

?>
