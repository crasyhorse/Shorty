# Refactoring an den Model-Klassen vornehmen

In diesem Ticket soll gezeigt werden, wie mit Hilfe von Unit/Feature Tests das Refactoring einer Klasse begleitet und abgesichert werden kann.

* Implementieren der Methode `findIt()`
  * Diese Methode soll in der Lage sein, eine Abkürzung anhand ihrer id zu finden.
  * Model-Klasse: `Shorty\Models\Shorty`
  * Name: `findIt`
  * Parameter: `int $id`
  * Rückgabewert: Instanz der Klasse `Shorty`, befüllt mit ihren Werten, oder `NULL`, falls `$id` nicht vorhanden ist (siehe hierzu: https://www.php.net/manual/de/functions.returning-values.php)
  * Hinweis: `findIt(9`) soll die `$f3->load()` Methode benutzen, um Datensätze zu suchen.
* Hinzufügen des benötigten Tests für ein Ergebnis ungleich `NULL`
  * Testklasse: `Tests\Unit\Models\Shorty`
  * Testname: `findIt_returns_an_abbreviation_based_on_a_given_id`
  * Dieser Test soll zeigen, dass die `findIt()` Methode eine Abkürzung, anhand einer id finden und zurückgeben kann.
* Hinzufügen des benötigten Tests für den Rückgabewert `NULL`
  * Testklasse: `Tests\Unit\Models\Shorty`
  * Testname: `findIt_returns_null_if_a_given_id_does_not_exist`
  * Dieser Test soll zeigen, dass `findIt()` `NULL` zurückliefert, falls die gegebene id in der Datenbank nicht existiert
* Implementieren der Methode `updateIt()`
  * Diese Methode soll das Updaten der Attribute der Model-Klassen vereinfachen
  * Model-Klasse: `Shorty\Models\Shorty`
  * Name: `updateIt`
  * Parameter: `array $attributes`
  * Rückgabewert: `void`
  * Hinweis: Diese Methode soll die Attribute aus einem Request entgegennehmen, mit Hilfe der id nach dem passenden Model suchen und die Attribute, unter zu Hilfenahme der `fill()` Methode in die Instanz von `Shorty` eintragen. Gespeichert wird nach wie vor mit `save()`
* Hinzufügen des benötigten Tests für den positiven Fall
  * Testklasse: `Tests\Unit\Models\Shorty`
  * Testname: `updateIt_modifies_values_of_an_existing_abbreviation`
  * Dieser Test soll zeigen, dass die Methode `updateIt()` in der Lage ist, einen bestehende Abkürzung zu verändern.
* Hinzufügen des benötigten Tests für den negativen Fall
  * Testklasse: `Tests\Unit\Models\Shorty`
  * Testname: `updateIt_throws_an_exception_if_a_given_id_does_not_exist_in_the_database`
  * Der Test soll zeigen, dass beim Versuch, einen Datensatz zu verändern, der noch nicht in der Datenbank existiert, eine Exception geworfen und die `updateIt()` Methode abgebrochen wird.
* Refactoring der Methode `AbbreviationController->patch()`. Diese soll ab jetzt die Methode `updateIt()` der Model-Klasse `Shorty` benutzen (nicht vergessen: Tests nach dem Refactoring ausführen).
  * Da die `updateIt()` Methode eine `PDOException` wirft, ist es sinnvoll, dass die `patch()` Methode diese aufnimmt und weiter wirft, anstatt eine einfache Exception zu werfen (vorsicht: Tests anpassen).
  * Die Anweisung `$id = $this->f3->get('PARAMS.id');` wird bei einer richtig typisierten `updateIt()` Methode einen Fehler erzeugen (siehe hierzu: https://www.php.net/manual/de/language.types.type-juggling.php)

# Hinweis zur Ausführung des Refactorings mit TDD

Um das Refactoring mit Hilfe von Test Driven Design durchzuführen, könnte wie folgt vorgegangen werden:

1. Erstellen eines Methoden-Stub (Methodenrumpf) von `findIt()` in `Shorty`
2. Erstellen eines Tests, der prüft, ob `findIt()` zu einer gegebenen id die korrekte Abkürzung zurückliefert -> Test verläuft rot.
3. Minimalimplementierung von `findIt()` erstellen, um den Test grün  werden zu lassen
4. Verfeinern der `findIt()` Methode bis zum gewünschten Ziel




Hier geht's weiter: https://github.com/crasyhorse/Shorty/tree/13_Creating_the_vue_instance