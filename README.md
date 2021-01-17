# Shorty - 02 Create a minimum example

Im dieser Lektion soll ein Minimalbeispiel erstellt werden, welches den Text "Hallo Welt" im Browser ausgibt. Hierfür ist folgendes notwendig:

* Anlegen des Verzeichnisses `resources/views/pages`
* Anlegen der Datei `resources/views/pages/index.html` mit folgendem Inhalt:

`index.html`
```html
<!DOCTYPE html>
<html>
<head></head>
<body>
  <h1>Hallo Welt</h1>
</body>
</html>
```

* Anlegen der Datei `./index.php`. Diese soll folgendes Leisten:
  * Anlegen der GET-Route `/` mit einem Closure (Funktion). Das Closure soll die Datei `resources/views/pages/index.html` als Template rendern und ausgeben.
  * Siehe hierzu:
    * https://fatfreeframework.com/3.7/getting-started#Hello,World:TheLess-Than-A-MinuteFat-FreeRecipe
    * https://fatfreeframework.com/3.7/routing-engine
    * https://fatfreeframework.com/3.7/views-and-templates

`index.php`
```php
<?php

require_once('vendor/autoload.php');

$f3 = Base::instance();

$f3->route('GET /', function () {
    echo Template::instance()->render('resources/views/pages/index.html');
});

$f3->run();
```
Hier geht's weiter: https://github.com/crasyhorse/Shorty/tree/02_create_the_abbreviation_controller_class