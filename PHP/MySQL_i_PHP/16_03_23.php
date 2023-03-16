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
}
else
{
    echo 'Nie udało się nawiązać połączenia';
}

?>
