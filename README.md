# Hinzufügen eines Negativtests

Auf Basis dieses Tickets soll ein Test entworfen werden, der zeigt, dass die Methode patch des AbbreviationController keine Datensätze verarbeitet, die noch nicht in der Datenbank existieren. Weiterhin muss sichergestellt sein, dass die Methode post richtig reagiert, falls versucht wird, eine bereits vorhandene Abkürzung (Kombination aus short + long) erneut zu erfassen.

* Hinzufügen eines neuen Tests
  * Name: `a_patch_request_may_not_add_a_new_abbreviation_to_the_database`
  * Testklasse: `AbbreviationControllerTest`
  * Dieser Test soll zeigen, dass die Methode `patch()` des `AbbreviationController` eine Exception wirft, falls versucht wird, einen Datensatz zu verändern der noch garnicht existiert. (Hinweis: Aktuell soll die `patch()` Methode nur die Exception werfen, es muss noch keine Reaktion auf die Exception erfolgen.)
  * siehe hierzu: https://phpunit.readthedocs.io/en/9.0/writing-tests-for-phpunit.html#testing-exceptions
* Hinzufügen eines weiteren Negativtests
  * Name: `post_must_react_to_unique_key_violation_when_adding_an_already_existing_abbreviation`
  * Testklasse: `AbbreviationControllerTest`
  * Dieser Test soll sicherstellen, dass die `post()` Methode des `AbbreviationController` korrekt reagiert und eine eigene Exception wirft, falls eine bereits vorhandene Kombination aus short + long erneut erfasst werden soll. (Hinweis: Aktuell soll die `post()` Methode nur die Exception werfen, es muss noch keine Reaktion auf die Exception erfolgen.)

# Hinweis

Aufgrund eines Fehlers im F3-Framework, muss vor der Ausführung der Methode `$f3->mock()` die Funktion `ob_end_clean()` aufgerufen werden. Geschieht dies nicht, so wird der Test als Risky markiert, da F3 seine Output buffer nicht korrekt schließt, wenn eine Exception geworfen wird, während die `$f3->run()` Methode läuft!




Hier geht's weiter: https://github.com/crasyhorse/Shorty/tree/12_refactoring_the_model