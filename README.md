# 05 Connect to a database

Hier soll nun die Verbindung zu einer Datenbank geschaffen werden. Zum Testen der Anwendung wird in einem ersten Schritt eine SQLite-Datenbank benutzt.

* Anbinden der Datenbank
  * Dateipfad: `database`
  * Datenbankname: `shorty.SQLite`
  * SQL-Skript: `database/shorty.sql`
  * Siehe hierzu: https://sqliteonline.com/
  * Tutorial zu SQLLite: https://www.sqlitetutorial.net/
* Eintragen der globalen Variablen `database_name` in die  Konfigurationsdatei (kompletter Connect String)
  * Siehe hierzu: https://fatfreeframework.com/3.7/framework-variables
* Erstellen der Klasse `BaseModel`
  * Dateipfad: `app/shorty/Models`
  * Dateiname: `BaseModel.php`
  * Diese Klasse erbt von `DB\SQL\Mapper`
  * Sie öffnet in ihrem Constructor die Verbindung zur Datenbank und
     instanziiert den Mapper (`DB\SQL\Mapper`)
  * Siehe hierzu: https://fatfreeframework.com/3.7/sql-mapper
  * Der Name der Tabelle für das mapping wird mittels Parameter an 
    den Constructor übergeben.
* Erstellen der Model-Klasse `Abbreviation`
  * Dateipfad: `app/shorty/Models`
  * Dateiname: `Abbreviation.php`
  * Dieses Model repräsentiert die Tabelle `abbreviations`
  * Es erbt von `Shorty\Models\BaseModel`
  * Der Constructor instanziiert die Tabelle `abbreviations`
* Implementieren der Methode `BaseModel->all()`
  * Diese Methode soll alle Datensätze einer Tabelle als Array
     zurückgeben. D. h. der Aufruf `(new Shorty())->all()` liefert
     alle Datensätze der Tabelle shorty.
  * Hier ist bei Bedarf eine Lösung zu finden:
     (https://stackoverflow.com/questions/35238544/using-fat-free-framework-fetch-from-table)

Hier geht's weiter: https://github.com/crasyhorse/Shorty/tree/06_integrate_php_unit_tests
