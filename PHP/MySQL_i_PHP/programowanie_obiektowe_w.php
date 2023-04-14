<?php
// 14.04.23 MySQLi w ujęciu obiektowym
#1: Nawiązanie połączenia z serwerem i wybór bazy (utworzenie nowego obiektu klasy mysqli)

// Nowy obiekt
$do_bazy = new mysqli('localhost','root','','kino'); 

#2: Obsługa błędów połączenia 
#      - komunikat o błędzie:   identyfikator -> connect_error
#      - kod błędu:             identyfikator -> connect_errno
#   Jeżeli error lub errno nie jest pusty to znaczy, że jest błąd z połączeniem

// die() jest aliasem do exit();
if($do_bazy -> connect_errno) die('<span style="color:red;">Nie udało się połączyć:</span> '.$do_bazy -> connect_error);
echo 'Nawiązanie połączenie<br>';

#3: Zapytania do bazy danych:
$zapytanie = $do_bazy -> query('SELECT * FROM filmy');

#4: Obsługa wyników zapytań
echo 'Liczba wyswietlonych wierszy: <b>'.$zapytanie -> num_rows.'</b><br>';

$tab = $zapytanie -> fetch_array();
echo $tab[0].' '.$tab[1].' '.$tab[2].' '.$tab[3];

#5: Zakończenie połączenia z serwerem
$do_bazy -> close();
?>
