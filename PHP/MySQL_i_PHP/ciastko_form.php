<?php

if(isset($_COOKIE['dane'])) 
{
    echo "Witamy po raz kolejny <b>{$_COOKIE['dane']}</b><br>";
    
    if(isset($_POST['delete_cookie']))
    {
        setcookie('dane', "{$_POST['imie']} {$_POST['nazw']}", time() - 604800);
        echo "Usunięto ciastko.";
    }
}
else 
{
    setcookie('dane', "{$_POST['imie']} {$_POST['nazw']}", time() + 604800);
    echo "Stworzono ciastko";
}

?>
