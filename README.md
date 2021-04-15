# Shorty - 01 Create a new project
## Projekt anlegen

Für die Software "Shorty" muss ein neues Projekt angelegt werden.

* Zum Anlegen des Projekts soll Composer benutzt werden (siehe hierzu: https://getcomposer.org/doc/03-cli.md#init)
  * Projektname: `sysz25/shorty`
  * Beschreibung: A small mapping tool for abbreviations and their meanings!
  * Typ: project
  * Lizenz: MIT
  * Autor: John Doe (JohnDoe@anonymous.org)
* Folgende Anforderungen muss die Software im Backend erfüllen:
  * Die PHP-Version muss mindestens 7.4 betragen, dies ist im Ordner S:\30 Bereiche\21 InfoMgmt\Intern\80_Software\PHP
  * Als Grundlage für das Backend soll das "Fat Free Framework" (`bcosca/fatfree-core`), in einer Version `>= 3.7 und < 4.0`, eingesetzt werden. (siehe hierzu: https://getcomposer.org/doc/articles/versions.md)
  * Die Source-Dateien sollen im Verzeichnis `app` abgelegt werden.
  * Für das Verzeichnis `app/shorty` soll der PSR-4 namespace `Shorty` angelegt werden. (siehe hierzu: https://www.php-fig.org/psr/psr-4/ und  https://getcomposer.org/doc/04-schema.md#psr-4)

* Die Konfiguration der Client-Komponenten soll mit NPM durchgeführt werden (siehe hierzu: https://docs.npmjs.com/creating-a-package-json-file)
  * Projektname: `shorty`
  * Version: `1.0.0`
  * Beschreibung: A small mapping tool for abbreviations and their meanings!
  * Main: `resources/js/app.js`
  * Autor: John Doe <johndoe@anonymous.org>
  * Lizenz: MIT
  * Keywords: `[]`
  * Engines: `"npm": "~6.0.0"`
  * Repository:
    * Typ: `git`
    * URL: `https://github.com/crasyhorse/Shorty.git`

* Die folgenden Anforderungen muss die Software im Frontend erfüllen:
  * Das Frontend soll auf dem Javascript Framework "VueJs" aufbauen (vue ^2.6.12)
  * Die notwendigen NPM-Pakete sollen installiert werden (siehe hierzu: https://docs.npmjs.com/cli/v6/commands/npm-install)

## Weiterführende Informationen

* Wo kommt der Ordner `node_modules` her? (siehe hierzu: https://docs.npmjs.com/cli/v6/configuring-npm/folders#node-modules)
* Was hat es mit dem Ordner `vendor` auf sich? (siehe hierzu: https://getcomposer.org/doc/01-basic-usage.md#installing-dependencies)
* Welche Bedeutung hat die Datei `.gitignore`? (siehe hierzu: https://www.freecodecamp.org/news/gitignore-what-is-it-and-how-to-add-to-repo/)
* Warum zwei verschiedene Package Manager - Composer und NPM? (siehe hierzu: https://ttmm.io/tech/tale-of-two-package-managers/)

Hier geht's weiter: https://github.com/crasyhorse/Shorty/tree/02_create_a_minimum_example