# Durchführen eines Refactorings an einem Test

* Implementieren eines neuen Tests aus dem bestehenden Test `fill_fills_the_attributes_of_a_model_from_http_response_with_valid_attributes_only`
  * Test-Klasse: `tests\Unit\Models\ShortyTest`
  * Testname: `fill_fills_the_attributes_of_a_model_from_http_response_with_valid_attributes`
  * Dieser Test soll beweisen, dass die Methode fill validate Attribute verarbeitet.
* Implementieren eines weiteren Tests
  * Testname: `fill_does_not_use_invalid_attributes_to_fill_a_model`
  * Dieser Test muss den Beweis erbringen, dass die Methode fill, ungültige Attribute beim Befüllen eines Models ignoriert.
* Implementierung eines Data providers für validate Eingabewerte
  * Test-Klasse: `tests\Unit\Models\ShortyTest`
  * Providername: `valid_request_values`
  * Dieser Data provider muss valide Eingabewerten liefern
  * Verknüpfter Test: `fill_fills_the_attributes_of_a_model_from_http_response_with_valid_values`
  * siehe https://phpunit.readthedocs.io/en/9.0/writing-tests-for-phpunit.html#data-providers
* Implementieren eines Data providers für invalide Eingabewerte
  * Test-Klasse: `tests\Unit\Models\ShortyTest`
  * Providername: `invalid_request_values`
  * Dieser Data provider muss ungültige Eingabewerten liefern
  * Verknüpfter Test: `fill_does_not_fills_the_attributes_of_a_model_from_http_response_with_invalid_values`
* Erstellen eines Setup-Fixtures (siehe https://phpunit.readthedocs.io/en/9.0/fixtures.html)
  * Im setup-Fixture sollen die vorbereitenden Tätigkeiten durchgeführt werden, die bisher in jedem einzelnen Tests durchgeführt wurden.