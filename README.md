# Erstellen der Vue-Instanz

In diesem Schritt wird die Vue-Instanz erzeugt und an ein Template gebunden.

* Anpassen des Templates (hinzufügen der einzelnen Elemente)
  * Template: `resources/views/pages/index.html`

`index.html`
```html
<!doctype html>
<html lang="de">
```

siehe hierzu: 
  https://developer.mozilla.org/en-US/docs/Glossary/Doctype
  https://developer.mozilla.org/en-US/docs/Web/HTML/Element/html

`index.html`
```html
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
```

siehe hierzu:
  https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meta
  https://www.mediaevent.de/meta/

`index.html`
```html
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
```

* Prüfen, ob das npm-Paket `vue` bereits installiert ist (sollte so sein).
* Importieren von Vuejs in die Applikation
* Erstellen der Vue-Instanz

`app.js`
```javascript
new Vue({
    el: '#app'
});
```

siehe hierzu: https://vuejs.org/v2/guide/instance.html#Creating-a-Vue-Instance

* Einbinden der Vue-Instanz in das Template
  * Template: `resources/views/pages/index.html`

`index.html`
```html
<body>
    <div id="app"></div>
</body>
```

Wie wird der Zusammenhang zwischen der Vue-Instanz und dem Template hergestellt?

siehe hierzu: https://vuejs.org/v2/guide/index.html




Hier geht's weiter: https://github.com/crasyhorse/Shorty/tree/14_Create_the_first_component