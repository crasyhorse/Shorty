# Erweitern des AbbreviationControllers um Post und Patch Route

* Verändern der Konfigurationsdatei
  * Entfernen des Route-Mappings aus der Konfigurationsdatei
  * Hinzufügen der GET-Route, als einzelne Route im Abschnitt routes
* Hinzufügen einer POST-Route, um neue Abkürzungen erstellen zu können
  * Route: `/abbreviation`
  * Controller: `AbbreviationController`
  * Methode: `post()`
* Hinzufügen einer PATCH-Route, um bestehende Abkürzungen verändern zu können
  * Route: `/abbreviation/@id`
  * Controller: `AbbreviationController`
  * Methode: `patch()`
* Frage: Welches Problem wäre entstanden, wenn weiterhin mit einem Route-Mapping gearbeitet worden wäre?
* Erstellen der benötigten Methoden `post()` und `patch()` im `AbbreviationController`




Hier geht's weiter: https://github.com/crasyhorse/Shorty/tree/10-feature_testing_abbreviationcontroller