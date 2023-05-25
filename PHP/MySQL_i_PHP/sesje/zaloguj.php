<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <title>PHP Autoryzacja Użytkownika</title>
    <style>
        #haslo
        {
            margin-top: 7.5px;
        }
        label
        {
            padding: 1px;
        }
        button
        {
            margin-top: 7.5px;
            margin-left: 142px;
        }
    </style>
</head>
<body>
    <!--Aby skrypt PHP się wykonał trzeba jeszcze raz załadować stronę, dlatego action='zaloguj.php'-->
    <form action="zaloguj.php" method="post">
        <label for="login">Login: <input type="text" id="login"></label><br>
        <label for="haslo">Haslo: <input type="password" id="haslo"></label><br>
        <button type="submit">Zaloguj</button>
    </form>
</body>
</html>

<?php

// Otwarcie sesji
session_start();

// Sprawdzenie czy istnieje zmienna sesji, jeśli tak => przekierowanie użytkowaika do pliku strona.php
if(isset($_SESSION['log'])) 
{
    header('location: strona.php');
} 

// Sprawdzenie, czy użytkownik wpisał dane do pól formularza i przesłał je na serwer, w przypadku braku zmiennej sesji
// Jeśli tak to dane porównywane są dane z loginem i hasłem jakie zostały podane, jeśli tak to tworzona jest zmienna sesji i użytkownik jest przekierowywany do pliku strona.php
elseif(isset($_POST['login']) && isset($_POST['haslo'])) 
{
    if($_POST['login'] == 'uczen' && $_POST['haslo'] == 'zsme') 
    {
        $_SESSION['log'] = $_POST['login'];
        header('location: strona.php');
    }
} 

// W przypadku braku zmiennej sesji i błędnych danych użytkownika
else 
{
    echo "<br><p style='color:red;'>Nieprawidłowe dane logowania!</p>";
}

?>
