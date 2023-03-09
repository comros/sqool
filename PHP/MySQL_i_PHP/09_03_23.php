<?php

$do_bazy = mysqli_connect('localhost', 'root', '', 'ksiegarnia');

if(!$do_bazy) 
{
    exit ('Błąd połączenia z serwerem MySQL.');
} 
else 
{
    echo 'Połączono z serwerem baz danych.<br>';
}
// mysqli_close($do_bazy);
// mysqli_error($do_bazy);
// mysqli_errno($do_bazy);
//mysqli_select_db($do_bazy, 'test');
mysqli_close($do_bazy);

$zapytanie1 = "SELECT * FROM klient";
$wynik = mysqli_query($do_bazy, $zapytanie1);

echo $wynik;

?>
