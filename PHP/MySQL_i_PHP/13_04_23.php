<?php
$do_bazy = mysqli_connect('localhost','root','','');
if($do_bazy -> connect_errno)
{
    echo "Nie udało się połączyć z serwerem MySQL: ".$do_bazy -> connect_error;
    exit();
}

$do_bazy -> query("CREATE DATABASE IF NOT EXISTS wycieczki CHARACTER SET utf8 COLLATE utf8_polish_ci");
$do_bazy -> select_db("wycieczki");


$do_bazy -> query("CREATE TABLE IF NOT EXISTS terminy (id int auto_increment primary key not null, termin date)");
$do_bazy -> query("CREATE TABLE IF NOT EXISTS miejsca (id int auto_increment primary key not null, lokalizacja varchar(30), kraj varchar(30))");
$do_bazy -> query("CREATE TABLE IF NOT EXISTS rezerwacje (id int auto_increment primary key not null, id_terminu int, id_miejsca int, rezerwujacy varchar(40));");

$do_bazy -> query("ALTER TABLE rezerwacje ADD FOREIGN KEY (id_terminu) REFERENCES terminy(id)");
$do_bazy -> query("ALTER TABLE rezerwacje ADD FOREIGN KEY (id_miejsca) REFERENCES miejsca(id)");

$do_bazy -> query("INSERT INTO terminy VALUES(1,'2023-06-30')");
$do_bazy -> query("INSERT INTO miejsca VALUES(1,'Paryz','Francja')");
$do_bazy -> query("INSERT INTO rezerwacje VALUES(1,1,1,'Jan Kowalski')");

$do_bazy -> close();
?>
