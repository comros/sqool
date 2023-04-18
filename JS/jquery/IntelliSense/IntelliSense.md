# Co to
IntelliSense forma automatycznego uzupełniania zawartego w Microsoft Visual Studio oraz Visual Studio Code.
W tym przypadku do jQuery.

# Jak pobrać
Wrzucić ten folder do głownego katalogu

lub w terminalu VSCode
```
npm install tsd -g
npm install typings --global
typings install dt~jquery --global
```

na koniec trzeba dodać na górze skryptu
```
/// <reference path="./typings/globals/jquery/index.d.ts"/>
```
i powinno zadziałac
