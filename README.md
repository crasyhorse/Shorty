# 07 Make models fillable

Dieser Schritt beinhaltet das Hinzufügen einer Methode zu den Model-Klassen, um diese mit Werten aus einem Request befüllen zu können.

* Hinzufügen des Attributes `fillable` zum BaseModel
  * Scope: `protected`
  * Name: `fillable`
  * Dieses Attribute legt fest, welche Attribute des Models direkt befüllt werden können.
* Initialisieren des Attributes `fillable` im Constructor der Model-Klasse `Abbreviation( ['id', 'short', 'long'])`
* Erweitern des Constructors der Model-Klasse `Abbreviation` um einen Parameter
  * Typ: `array`
  * Name: `$request`
  * nullable
* Implementieren der Methode `fill()` in der Model-Klasse `Abbreviation`. Diese Methode macht folgendes:
  * Entgegennehmen aller Werte aus einem Request
  * Vergleichen der Feldnamen im Request mit den Feldnamen im array `fillable` auf Übereinstimmung
  * Übernehmen der Werte in das Model für alle Attribute die gleichermaßen im Request und im Array `fillable` vorhanden sind
  * Request-Felder, deren Name nicht im Array `fillable` auftaucht, werden verworfen
  * Die Methode `fill` wird im Constructor der Model-Klasse `Abbreviation` aufgerufen. Dies darf nur dann der Fall sein, wenn `$request` ungleich `NULL` ist.
 ALTERNATIVE: Implementieren der Methode `fill()`, unter Ausnutzung des Template Method Pattern (siehe https://refactoring.guru/design-patterns/template-method/php/example)
* Anlegen eines Tests
  * Testklasse: `Tests\Unit\Models\AbbreviationTest`
  * Name: `fill_fills_the_attributes_of_a_model_from_http_response_with_valid_attributes_only`
  * Dieser Test soll beweisen, dass die Methode `fill()` validate Attribute  verarbeitet, während sie ungültige Attribute verwirft.

Hier geht's weiter: https://github.com/crasyhorse/Shorty/tree/08_test_refactoring
