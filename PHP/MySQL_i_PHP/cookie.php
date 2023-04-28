<style>
    table, td, th, tr
    {
        border-collapse: collapse;
        border: 1px black solid;
    }
</style>
<?php
$ciasteczko = setcookie("pismo", "Na skróty", time() + 3600, "/", "localhost", false, true);
if($ciasteczko == true) 
{
    echo "Przesłano plik cookie: <b>".$_COOKIE['pismo']."</b> <br>";
}
else
{
    echo "Nie udało się przesłać pliku cookie<br>";
}

// Zmienne przesłane z formularza
$imie = $_POST['im'];
$nazwisko = $_POST['nazw'];

// Próbuje łączyć się z serwerem
$do_bazy = new mysqli('localhost', 'root', '', '');

// Sprawdza, czy udało się połączyć
if($do_bazy->errno)
{
    echo "Błąd: ".$do_bazy->error;
    exit();
}

// Tworzy i wybiera bazę danych kino
$do_bazy->query("CREATE DATABASE IF NOT EXISTS kino");
$do_bazy->select_db('kino');

// Tworzy tabele klienci
$do_bazy->query("CREATE TABLE IF NOT EXISTS klienci (id int auto_increment not null primary key, imie varchar(30), nazwisko varchar(40))");

// Dodaje do tabeli klienci dane przesłane z formularza
if($imie != null && $nazwisko != null) 
{
    $do_bazy->query("INSERT INTO klienci (imie, nazwisko) VALUES ('$imie', '$nazwisko')");
}
else 
{
    echo "<br><span style='color:red;'>Pole obowiązkowe nie zostało wypełnione!</span>";
}

// Wysyła zapytanie o dane z tabeli klienci i je wyświetla
$zapytanie = $do_bazy->query("SELECT * FROM klienci");
echo "<table><tr><th>ID</th><th>Imię</th><th>Nazwisko</th></tr>";
while($wynik = $zapytanie->fetch_array(MYSQLI_ASSOC))
{
    echo "<tr><th>".$wynik['id'].'</th><th>'.$wynik['imie'].'</th><th>'.$wynik['nazwisko'].'</th></tr>';
}
echo "</table>";

// Zamyka połączenie
$do_bazy->close();

?>
