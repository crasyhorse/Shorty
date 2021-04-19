const szSearchfield = {
    template: `
    <form class="mt-5">
        <div class="form-row">
            <div class="col-md-12">
                <label class="mr-2" for="txtSearch">Suche:</label>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="suchbegriff" v-model="searchTerm" />
                    <div class="input-group-append">
                        <button type="button" @click="onSearch" class="btn btn-primary">Suche</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    `,
    data() {
        return {
            searchTerm: null
        }
    },
    methods: {
        onSearch() {
            this.$emit('search', this.searchTerm);
        }
    }
}

const szShorty = {
    template: '<sz-searchfield v-on:search="onFilterAbbreviations"></sz-searchfield>',
    components: {
        'sz-searchfield': szSearchfield,
    },
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
    },
    methods: {
        onFilterAbbreviations(searchTerm) {
            const pattern = `(.*)${searchTerm}(.*)`;
            this.filteredAbbreviations = this.abbreviations.filter((value) => {
                return new RegExp(pattern, 'gi').test(JSON.stringify(value));
            });
        }
    }
}

const szNavbar = {
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
};

const vm = new Vue({
    el: '#app',
    components: {
        'sz-navbar': szNavbar,
        'sz-shorty': szShorty
    }
});