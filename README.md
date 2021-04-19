# Testen der AbbreviationController-Klasse

In diesem Schritt werden die post- und die patch-Methode des `AbbreviationController` mit Leben gefüllt und getestet. Sinn und Zweck dieses Arbeitsschrittes ist es, die Verfahrensweise des Test Driven Design an einem einfachen Beispiel zu zeigen.

Bitte hierzu im Vorfeld folgendes lesen: https://de.wikipedia.org/wiki/Testgetriebene_Entwicklung

* Erstellen einer neuen Testklasse
  * Dateiverzeichnis: `tests/Feature/Http/Controllers`
  * Dateiname: `AbbreviationControllerTest.php`
  * Klassenname: `AbbreviationControllerTest`
* Erstellen einer neuen Testsuite
  * Name: `Feature`
  * suffix: `.php`
  * directory: `./tests/Feature`
* Erstellen eines Feature-Tests (siehe Anmerkung unten)
  * Name: `a_post_request_adds_a_new_abbreviation_to_the_database`
  * Testklasse: `AbbreviationControllerTest`
  * Dieser Test soll zeigen, dass bei einem POST-Request auf der Route `/abbreviation` ein neuer Datensatz in die Datenbank eingetragen wird.
* Erstellen eines weiteren Feature-Tests
  * Name: `a_patch_request_updates_an_abbreviation_in_the_database`
  * Testklasse: `AbbreviationControllerTest`
  * Dieser Test soll zeigen, dass beim einem PATCH-Request auf der Route
  * `/abbreviation/@id` ein bestehender Datensatz geändert wird.

# Hinweise
* Bitte zuerst den Test erstellen und dann die post-Methode im  `AbbreviationController` mit Inhalt befüllen. Im ersten Testlauf sollte der Test das Ergebnis Rot zeigen.
* Das Mocking eines POST-Requests kann mit f3 wie folgt aussehen:

```php
  $f3->mock('POST /abbreviation', ['id' => 7, 'short' => 'arccos', 'long' => 'arcus cosinus']);
```
  siehe: https://fatfreeframework.com/3.7/base#mock
* Es muss beachtet werden, dass der Test beliebig oft durchgeführt werden  können soll, d. h. der eingefügte Datensatz muss vor der Testausführen gelöscht werden.

# Unterschied zwischen Unit-Tests und Feature-Tests

Ein Unit-Test soll so gehalten sein, dass er eine einzelne Unit tests. Unter einer Unit versteht man meist eine relativ kleine Menge Code, z. B. eine einzelne Methode. Diese Art von Test soll sicherstellen, dass die Unit genau das tut, was sie tun soll. Wichtig ist, es muss sowohl Positivtests, als auch Negativtests geben. 

Positivtests sollen zeigen, dass die Unit in einem korrekten Kontext richtig arbeit. Negativtests müssen beweisenn, dass die Unit in der Lage ist, auf Fehler korrekt zu reagieren, d. h. eine Fehlerbehandlung durchuführen.

Unter einem Kontext versteht man das Umfeld einer Unit, z. B. eine bestehende Konfiguration oder auch die Eingabeparameter der Unit, letztlich alles, was die Ausführung der Unit beeinflusst.

Feature tests testen das Zusammenspiel zwischen mehreren Units, z. B. den Zugriff auf eine Route, der durch einen Controller verarbeitet wird und für dessen Verarbeitung evtl. auch Model-Klassen benötigt werden. Ein Feature kann dabei beliebig aufwendig sein. Trotzdem sollte darauf geachtet werden, dass Feature tests nicht zu groß und damit unpflegbar werden.




Hier geht's weiter: https://github.com/crasyhorse/Shorty/tree/11_adding_a_first_negative_test