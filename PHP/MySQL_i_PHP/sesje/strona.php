<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <title>Strona Internetowa</title>
</head>
<body>
    <form action="wyloguj.php" method="post">
        <button type="submit">Wyloguj</button>
    </form>
</body>
</html>

<?php

session_start();

// Jeśli nie ma zmiennej sesji ze strony zaloguj.php to wraca tam użytkownika
if(!isset($_SESSION['log']))
{
    header('location: loguj.php');
}
else
{
    echo "<p style='font-size:16px;'>Witaj na stronie".$_SESSION['log']."</p>";
}

?>
