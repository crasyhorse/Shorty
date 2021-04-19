# Erstellen der Such-Komponente

Diese Ticket sieht vor, dass eine Suchfeld-Komponente in die Anwendung integriert wird. Es soll dem Benutzer möglich sein, eine Zeichenkette in ein Textfeld einzutragen und dann den Suchvorgang via Klick auf einen Button zu initiieren.

* Anpassen des Template-Body
  * Templatename: `resources/views/pages/index.html`
  * An stelle von XXX werden die noch zu erstellenden Komponenten eingefügt

`index.html`
```html
<body>
    <div id="app">
        <sz-navbar></sz-navbar>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    XXX
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="resources/js/app.js"></script>
</body>
```
* Erstellen der Suchfeld-Komponente
  * Name: `SZSearchfield`
  * Template (nicht vollständig!):

`app.js`
```html
    <form class="mt-5">
        <div class="form-row">
            <div class="col-md-12">
                <label class="mr-2" for="txtSearch">Suche:</label>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="suchbegriff" />
                    <div class="input-group-append">
                        <button type="button" class="btn btn-primary">Suche</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
```
* Das Textfeld muss so ergänzt werden, dass sein Inhalt mittel 2-way Binding in der Variablen `searchTerm` in der Komponente gespeichert wird.
  * https://vuejs.org/v2/guide/forms.html
  * https://vuejs.org/v2/guide/components.html#Using-v-model-on-Components
* Hinzufügen einer Methode zur Komponente
  * Name: `onSearch`
  * Diese Methode soll das Event `search` emmittieren. Dem Event muss der Inhalt des Textfeldes übergeben werden.
  * https://vuejs.org/v2/guide/computed.html#Computed-Caching-vs-Methods
  * https://vuejs.org/v2/guide/events.html
  * https://vuejs.org/v2/guide/components.html#Listening-to-Child-Components-Events
  * https://vuejs.org/v2/guide/components-custom-events.html#Event-Names
* Die Suchfeld-Komponente muss so ergänzt werden, dass der Button via Klick die Methode `onSearch()` auslöst/aufruft.
* Erstellen einer Komponente als Hauptkomponente
  * Name: `SZShorty`
  * Registrierte Komponenten: `SZSearchfield`
  * Registrierung: Lokal in der Vue-Instanz
  * `data` (kann direkt kopiert werden)

```javascript
    data() {
        return {
            abbreviations: [
                { id: 1, short: 'Abb', long: 'Abbildung' },
                { id: 2, short: 'abs', long: 'absolut' },
                { id: 3, short: 'AC', long: 'axiom of choice' },
                { id: 4, short: 'adj', long: 'adjungiert' },
                { id: 5, short: 'adj', long: 'adjunkt' },
                { id: 6, short: 'AGM', long: 'arithmetisch-geometrisches Mittel' }
            ],
            filteredAbbreviations: this.abbreviations,
        };
    }
```
* Die Komponente `szShorty` muss auf das `search` Event der Komponente `SZSearchfield` lauschen.
* Ergänzen der Komponente `SZShorty` um eine Event handler Methode
  * Name: `onFilterAbbreviations`
  * Parameter: `searchTerm`
  * Diese Methode soll mit Hilfe der Array.prototype.filter-Methode und unter zuhilfenahme eines Regulären Ausdrucks den Array `abbreviations` filtern und das Ergebnis in den Array `filteredAbbreviations` übertragenen.
  * https://developer.mozilla.org/de/docs/Web/JavaScript/Reference/Global_Objects/Array/filter
  *  https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/RegExp
  *  https://developer.mozilla.org/de/docs/Web/JavaScript/Reference/Global_Objects/RegExp/test
  *  https://stackoverflow.com/questions/7038575/find-element-in-array-using-regex-match-without-iterating-over-array
  *  https://developer.mozilla.org/de/docs/Web/JavaScript/Reference/Global_Objects/JSON
  *  https://developer.mozilla.org/de/docs/Web/JavaScript/Reference/Global_Objects/JSON/stringify
* Einbinden der Komponente `SZShorty` in das Template
  * Templatename: `resources/views/pages/index.html`
  * Einbinden an der Stelle von XXX
* Anpassung am Backend
  * Setzen der Umgebungsvariablen "UI" in der Konfigurationsdatei `config.ini` auf den Werte `resources/views/` (siehe hierzu: https://fatfreeframework.com/3.7/quick-reference#UI)
* Anpassen der Klasse `AbbreviationController`
  * streiche: `echo Template::instance()->render('resources/views/pages/index.html');`
  * setze: `echo Template::instance()->render('pages/index.html');`

# Hinweis

Die folgenden Fragen sollten nach Bearbeitung dieses Tickets beantwortet werden können:

* Warum stehen die beiden script-Tags nicht im head-Tag des Dokuments, sondern  am Ende?
* Wie ist die `v-model` Directive intern umgesetzt, bzw. welche Attribute und Events werden dazu benutzt um sie umzusetzen.
* Wie lautet die Kurzschreibweis für `v-on`?
* Was ist bei der Namensgebung für Events zu beachten?
* Was bedeuten die Event modifier `stop`, `prevent` und `once`?
  * https://developer.mozilla.org/en-US/docs/Web/API/Event/preventDefault
  * https://developer.mozilla.org/en-US/docs/Web/API/Event/stopPropagation
  * https://developer.mozilla.org/en-US/docs/Web/API/Document_Object_Model/Examples#Example_5:_Event_Propagation
* Was sind Lambda-Ausdrücke/Pfeilfunktionen?
  * https://developer.mozilla.org/de/docs/Web/JavaScript/Reference/Functions/Pfeilfunktionen
  * https://codeburst.io/javascript-understand-arrow-function-syntax-ab4081bba85b?gi=90701078704
* Wie könnte der folgende Ausdruck alternativ geschrieben werden?

```javascript
  elements.map((element) => {
      return element.length
  });
```
* Was ist an dem folgenden Lambda-Ausdruck falsch?

```javascript
  const fn = () => {foo:'bar'};
```
  * Hinweise: 
    Ein `console.log(fn())` sollte `Object { foo: "bar" }` ausgeben.
    siehe hierzu: https://developer.mozilla.org/de/docs/Web/JavaScript/Reference/Functions/Pfeilfunktionen#R%C3%BCckgabe_von_Objekt-Literalen
* Was bedeutet die Aussage "Keine Bindung von this" in Zusammenhang mit Pfeilfunktionen?
* Betrachten Sie folgendes Beispiel (zu finden unter der Überschrift "Pfeilfunktionen als Methoden" in der Dokumentation der Pfeilfunktionen auf developer.mozilla.org)

```javascript
use strict';

var obj = {
  i: 10,
  b: () => console.log(this.i, this),
  c: function() {
    console.log( this.i, this)
  }
}
obj.b(); // gibt undefined, Window {...} aus (oder das globale Objekt)
obj.c(); // gibt 10, Object {...} aus
```
  * Warum gibt der Ausdruck `obj.b();` den Wert `undefined, Window {...}` aus? (Hinweis: Die Antwort ist unter der Überschrift "Keine Bindung von this" zu finden!)





Hier geht's weiter: https://github.com/crasyhorse/Shorty/tree/16-Integrating_eslint