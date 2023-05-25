<?php

session_start();

// Usuwanie zmiennej sesji
if(isset($_SESSION['log']))
{
    unset($_SESSION['log']);
}
else
{
    header('location: zaloguj.php');
}

session_destroy();
echo "<p style='font-size: 16px;'>Zostałeś wylogowany!</p>";
?>
