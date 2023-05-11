<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <title>Zastosowanie plików cookie</title>
</head>
<body>
    
</body>
</html>

<?php

// date('F d h:i A'): [Miesiąc] [dzień] [godzina_w_formacie_12]:[minuty_poprzedzone_zerem] [AM/PM]

// Tworzenie ciastka i przypisywanie go do zmiennej
$ciasteczko = setcookie("wizyta", date('F d h:i A'), time() + 3600);

// Sprawdzenie czy ciastko zostało przesłane
if(isset($_COOKIE['wizyta'])) 
{
    echo "Witamy ponownie! Ostatni raz odwiedziłeś nas: <b>".$_COOKIE["wizyta"].'</b> <br>';
}
else 
{
    echo 'Witaj na naszej stronie<br>';
}

// Usuawanie pliku cookie
// setcookie("wizyta", date('F d h:i A'), time() - 10);

?>
