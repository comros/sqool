<?php

// Łączenie się z serwerem
$do_bazy = mysqli_connect('localhost','root','','');

// Sprawdzenie czy połączenie udało się
if(mysqli_connect_errno()) 
{
    echo "Błąd połączenia: ".mysqli_connect_error();
    exit();
}

// Tworzenie bazy
mysqli_query($do_bazy, "CREATE DATABASE IF NOT EXISTS kino_mysqli");
mysqli_select_db($do_bazy, 'kino_mysqli');

// Tworzenie tabeli
mysqli_query($do_bazy, "CREATE TABLE IF NOT EXISTS filmy (id_filmu int auto_increment primary key, tytul varchar(30), rezyser varchar(30), rok_produkcji year)");
mysqli_query($do_bazy, "CREATE TABLE IF NOT EXISTS seanse (id_seansu int auto_increment primary key, godzina_seansu time)");

// Dodawanie wpisu tylko, gdy zapytanie o dany tytuł zwraca empty set
if(mysqli_num_rows(mysqli_query($do_bazy, "SELECT tytul FROM filmy WHERE tytul='Interstellar'")) === 0) 
{
    mysqli_query($do_bazy, "INSERT INTO filmy VALUES(null,'Interstellar','Christopher Nolan',2014)");
}

if(mysqli_num_rows(mysqli_query($do_bazy, "SELECT tytul FROM filmy WHERE tytul='Joker'")) === 0)  
{
    mysqli_query($do_bazy, "INSERT INTO filmy VALUES(null,'Joker','Todd Phillips',2019)");
}

if(mysqli_num_rows(mysqli_query($do_bazy, "SELECT tytul FROM filmy WHERE tytul='John Wick 4'")) === 0)
{
    mysqli_query($do_bazy, "INSERT INTO filmy VALUES(null,'John Wick 4','Chad Stahelski',2023)");
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
