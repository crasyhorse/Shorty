Vue.component('sz-navbar', {
    template: `
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
`
});

const vm = new Vue({
    el: '#app'
});