# 06 Integrating PHP-Unit tests

Durch das Integrieren von PHP-Unit in das Projekt soll die Codebasis sicherer und qualitativ besser gemacht werden.

* Installieren von PHP-Unit 9 mittels Composer
  * PHP-Unit soll als dev-dependency installiert werden.(Erklärung für dev-dependency: https://bit.ly/3mLPpZF)
* Erstellen der PHP-Unit-Konfiguration (https://phpunit.readthedocs.io/en/9.0/configuration.html)
  * Anlegen der Datei `phpunit.xml` im Hauptverzeichnis
  * Der Autoloader muss vor der Ausführung der Tests geladen werden
  * Testergebnisse sollen farbig dargestellt werden
  * Ereignisse der Typen `E_ERROR` und `E_USER_ERROR` sollen in Exceptions umgewandelt werden
  * Ereignisse der Typen `E_STRICT`, `E_NOTICE`, und `E_USER_NOTICE` sollen in Exceptions umgewandelt werden
  * Ereignisse der Typen `E_WARNING` und `E_USER_WARNING` sollen in Exceptions umgewandelt werden
  * PHP-Unit soll beim ersten Auftreten eines Fehlers beendet werden
  * Ausgabe der Testergebnisse im TestDox-Format
* Anlegen einer Testsuite namens "Unit"
  * Name: `Unit`
  * suffix: `.php`
  * directory: `.tests/Unit`
* Anlegen des PSR-4 Namespaces `Tests` in der Datei `composer.json`
* Einfügen der F3-Variablen `AUTOLOADER` in die Datei `config.ini`, so dass diese in der Software und in jedem Test verfügbar ist
* Anlegen der Test-Klasse `AbbreviationTest` (https://phpunit.de/getting-started/phpunit-9.html)
  * Dateipfad: `tests/Unit/Models`
  * Dateiname: `AbbreviationTest.php`
* Anlegen eines Tests
  * Name: `all_returns_all_rows_from_a_table`
  * Dieser Test muss beweisen, dass die Methode `Abbreviation->all()` alle Datensätze der Tabelle `abbreviation` zurückliefert.

Hier geht's weiter: https://github.com/crasyhorse/Shorty/tree/07_make_models_fillable
