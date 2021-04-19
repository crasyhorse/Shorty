# Erstellen einer ersten Vue-Komponente

* Einbinden von Twitter Bootstrap als CDN (nur CSS, kein Java Script) (siehe https://getbootstrap.com/docs/4.1/getting-started/introduction/)
* Erstellen einer Toolbar-Komponente
  * Name: `sz-navbar`
  * Template:

`app.js`
```html
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" 
           href="#"
        >
           <img src="resources/img/Wappen_SZ25_web_klein.PNG">
           <span>Sysz25 - Shorty</span>
        </a>
        <button 
            class="navbar-toggler" 
            type="button" 
            aria-controls="navbarSupportedContent" 
            aria-expanded="false" 
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
```

siehe hierfür:

https://vuejs.org/v2/guide/components.html
https://vuejs.org/v2/guide/components-registration.html

* Einbinden der Komponente `sz-navbar` in das Template (das Styling der Komponente ist zu diesem Zeitpunkt noch nicht wichtig. Dies wird in einem späteren Ticket behandelt.)

# Hinweis

Die folgenden Fragen sollten nach Bearbeitung dieses Tickets beantwortet werden können:

* Was ist eine Vue-Komponente?
* Warum muss `data` eine Funktion sein?
* Was ist bei der Namensgebung für Komponenten zu beachten?
* Worin besteht der Unterschied zwischen den beiden folgenden Beispielen A und B?

Beispiel A:
```javascript
Vue.component('sz-navbar', {/* ... */});

const vm = new Vue({
    el: '#app'
});
```

Beispiel B:
```javascript
const szNavbar = {/* ... */};

const vm = new Vue({
    el: '#app',
    components: {
        sz-navbar: szNavbar
    }
});
```

* Was ist am folgenden Beispiel falsch?

```javascript
const vm = new Vue({
    el: '#app'
});

Vue.component('sz-navbar', {/* ... */});
```



Hier geht's weiter: https://github.com/crasyhorse/Shorty/tree/15_Implementing_the_search_field