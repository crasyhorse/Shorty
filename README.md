# 03 Create the AbbreviationController class

In diesem Schritt soll eine REST-Api (https://de.wikipedia.org/wiki/Representational_State_Transfer) nach den Standards von Fat Free Framework implementiert werden. Hierfür wird eine Controller-Klasse erstellt, die für die Annahme sämtlicher Requests zuständig ist.

* Anlegen des Controller-Klasse `AbbreviationController`
  * Dateipfad: `app/shorty/Http/Controllers`
  * Dateiname: `AbbreviationController.php`
  * Der Controller ist mit dem korrekten Namespace zu versehen
* Einrichten eines Route-mappings (Resource-Method-Representation)
  * https://www.peej.co.uk/articles/rmr-architecture.html
  * Das Mapping muss den `AbbreviationController` verwenden
  * Route: `/`

`index.php`
```php
<?php

require_once('vendor/autoload.php');

$f3 = Base::instance();
$f3->set('AUTOLOAD', 'app/');

$f3->map('/', 'Shorty\Http\Controllers\AbbreviationController');

$f3->run();
```
* Erstellen der Methode `get()` im `AbbreviationController`
  * Die get-Methode soll die View `resources/views/pages/index.html` als Template rendern (wie im vorangegangenen Beispiel).

Hier geht's weiter: https://github.com/crasyhorse/Shorty/tree/04_implement_a_route_configuration