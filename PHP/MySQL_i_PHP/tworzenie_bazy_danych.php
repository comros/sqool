<?php
// 13.04.23 Tworzenie bazy danych za pomocą zapytań

#1: Nawiązanie połączenia z serwerem bazodanowym
$do_bazy = mysqli_connect('localhost','root','','');
if($do_bazy -> connect_errno)
{
    echo "Nie udało się połączyć z serwerem MySQL: ".$do_bazy -> connect_error;
    exit();
}
#2: Utworzenie bazy
#   - nazwa bazy: kino
$do_bazy -> query("CREATE DATABASE IF NOT EXISTS kino CHARACTER SET utf8 COLLATE utf8_polish_ci");

#3: Wybór utworzonej bazy
$do_bazy -> select_db("kino");

#4: Tworzenie struktury bazy
#   - filmy (id_filmu int autoincrement primary key, tytul varchar(30), rezyser varchar(30), rok_produkcji year)
#   - seanse (id_seansu int autoincrement primary key, godzina_seansu time)

$do_bazy -> query("CREATE TABLE IF NOT EXISTS filmy (id_filmu int auto_increment primary key, tytul varchar(30), rezyser varchar(30), rok_produkcji year)");
$do_bazy -> query("CREATE TABLE IF NOT EXISTS seanse (id_seansu int auto_increment primary key, godzina_seansu time)");

#5: Dodanie przykładowych danych do bazy
#   - do tabeli filmy dodaj informacje o 3 twoich ulubionych filmach
#   - do tabeli seanse dodaj: 10:00, 18:00

$do_bazy -> query("INSERT INTO filmy VALUES(null,'Interstellar','Christopher Nolan',2014)");
$do_bazy -> query("INSERT INTO filmy VALUES(null,'Joker','Todd Phillips',2019)");
$do_bazy -> query("INSERT INTO filmy VALUES(null,'John Wick 4','Chad Stahelski',2023)");

$do_bazy -> query("INSERT INTO seanse VALUES(null,'10:00')");
$do_bazy -> query("INSERT INTO seanse VALUES(null,'18:00')");


$do_bazy -> close();
?>