# 04 Implement a route configuration

Als nächstes sollen alle Routen/Mappings aus der Datei `index.php` in eine eigene Konfigurationsdatei ausgelagert werden. (https://fatfreeframework.com/3.7/framework-variables)

* Anlegen der Konfigurationsdatei
  * Dateipfad: `./config`
  * Dateiname: `config.ini`
  * Anlegen der Mapping-Sektion
  * Eintragen des Route-Mappings
* Laden der Konfiguration in der Datei `index.php`
* Bereinigen der Datei `index.php` (dort dürfen keine Routen mehr zu sehen sein.)

`index.php`
```php
<?php

require_once('vendor/autoload.php');

$f3 = Base::instance();
$f3->set('AUTOLOAD', 'app/');
$f3->config('config/config.ini');

$f3->run();
```

Hier geht's weiter: https://github.com/crasyhorse/Shorty/tree/05_connect_to_a_database