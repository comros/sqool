<?php

$do_bazy = mysqli_connect('localhost', 'root', '', 'ksiegarnia');

if($do_bazy)
{
    echo 'Nawiązano połączenie z serwerem i wybrano bazę księgarnia';
    $zapyt1 = 'SELECT * FROM klient';
    $wynik1 = mysqli_query($do_bazy, $zapyt1);
    while($tab1 = mysqli_fetch_row($wynik1))
    {
        echo $tab1[0].' '.$tab1[1].' '.$tab1[2].'<br>';
    }

    // cw1. Wyswietl adresy wszystkich klientów z tabeli klient
    $zapyt2 = 'SELECT Nazwisko, Imie, Kod_pocztowy, Miejscowosc, Ulica, Nr_Domu 
    FROM klient WHERE Telefon != 0';
    $wynik2 = mysqli_query($do_bazy, $zapyt2);

    echo '<br><h3>Testowanie mysqli_fetch_array()</h3>';

    while($tab2 = mysqli_fetch_array($wynik2))
    {
        echo '<b>'.$tab2['Nazwisko']
        .' '.$tab2['Imie']
        .'</b> Adres zamieszkania: <b>'.$tab2['Miejscowosc']
        .', ul.'.$tab2['Ulica'].' '.$tab2['Nr_Domu'].'</b><br>';
    }

    echo 'W tabeli klient zapisano informacje o '.mysqli_num_rows($wynik2).' klientach<br>';

}
else
{
    echo 'Nie udało się nawiązać połączenia';
}

?>
