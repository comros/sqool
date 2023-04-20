<?php

// Łączenie się z serwerem
$do_bazy = mysqli_connect('localhost','root','','');

// Sprawdzenie czy połączenie udało się
if(mysqli_connect_errno()) 
{
    echo "Błąd połączenia: ".mysqli_connect_error();
    exit();
}

echo "Nawiązano połączenie<br>";

$tytul = $_POST['tytul'];
$autor = $_POST['autor'];
$rok_produkcji = $_POST['rok_produkcji'];

// Tworzenie bazy (innym sposobem niż z if not exists)
if(mysqli_select_db($do_bazy, 'kino_mysqli'))
{
    echo "Wybrano bazę danych kino_mysqli<br>";
}
else
{
    $zapytanie = mysqli_query($do_bazy, "CREATE DATABASE kino_mysqli");
    if($zapytanie) echo "Utworzono baze danych";
    else echo "Nie udało się stworzyć bazy danych".mysqli_error($do_bazy)."<br>";
}

// Tworzenie tabeli
mysqli_query($do_bazy, "CREATE TABLE IF NOT EXISTS filmy (id_filmu int auto_increment primary key, tytul varchar(30), rezyser varchar(30), rok_produkcji year)");
mysqli_query($do_bazy, "CREATE TABLE IF NOT EXISTS seanse (id_seansu int auto_increment primary key, godzina_seansu time)");

// Dodawanie wpisu tylko, gdy zapytanie o dany tytuł zwraca empty set
if(mysqli_num_rows(mysqli_query($do_bazy, "SELECT tytul FROM filmy WHERE tytul='$tytul'")) === 0) 
{
    mysqli_query($do_bazy, "INSERT INTO filmy VALUES(null,'$tytul','$autor','$rok_produkcji')");
}
else
{
    echo "<span style='color:red'>Taki film już się znajduje w bazie danych!</span><br>";
}

// Dodawanie wpisu tylko, gdy zapytanie o dany tytuł zwraca empty set
if(mysqli_num_rows(mysqli_query($do_bazy, "SELECT godzina_seansu FROM seanse WHERE godzina_seansu='10:00'")) === 0)
{
    mysqli_query($do_bazy, "INSERT INTO seanse VALUES(null,'10:00')");
}

if(mysqli_num_rows(mysqli_query($do_bazy, "SELECT godzina_seansu FROM seanse WHERE godzina_seansu='18:00'")) === 0)
{
    mysqli_query($do_bazy, "INSERT INTO seanse VALUES(null,'18:00')");
}

// Zakończenie połączenia
mysqli_close($do_bazy);

?>
