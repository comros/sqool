<html>
    <head>
        <style>
            body { overflow: hidden;}
            table, th, td
            {
                border: 1px solid black;
                border-collapse: collapse;
            }
            #spin
            {
                width: 10;
                height: 10;
                display: inline-block;
                animation: anim 2s linear; /* infinite */
            }
            @keyframes anim {
                0%
                {
                    transform: rotate(0deg);
                    color: red;
                    width: 500px;
                    font-size: 500px;
                }
                80%
                {
                    transform: rotate(-3600deg);
                    color: blue;
                    width: 10px;
                }
                100%
                {
                    color: red;
                    width: 10px;
                }
            }
        </style>
    </head>
</html>
<?php
$do_bazy = mysqli_connect('localhost', 'root', '', 'znajomi');

if($do_bazy)
{
    $zapytanie = mysqli_query($do_bazy, 'SELECT rodzaj_kontaktu, kontakt FROM kontakty WHERE rodzaj_kontaktu="email"');
    
    echo '<table><tr><th>rodzaj_kontaktu</th><th>kontakt</th></tr>';

    while($tab1 = mysqli_fetch_row($zapytanie))
    {
        echo '<tr><td>'.$tab1[0].'</td><td>'.$tab1[1].'</td></tr>';
    }
    echo '</table><br><br>W bazie zapisano:<br> <div><p id="spin"><b>'.mysqli_num_rows($zapytanie).'</b></p> adresy email</div>';
}
else
{
    echo 'Nie udało się nawiązać połączenia';
}

mysqli_close($do_bazy);

?>
