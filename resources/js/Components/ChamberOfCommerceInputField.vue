<template>

    <!-- Company name -->
    <div class="mt-4">
        <label for="company_name">Bedrijf</label>

        <div class="autosuggest-container">
            <vue-autosuggest
                v-model="query"
                :suggestions="filteredOptions"
                @input="onInputChange"
                @selected="onSelected"
                name="company-name"
                :get-suggestion-value="getSuggestionValue"
                :input-props="{id:'autosuggest__input', name:'company_name', class:'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full'}">
                <div slot-scope="{suggestion}">
                    <div style="{ display: 'flex', color: 'navyblue'}">{{ suggestion.item.handelsnaam }}</div>
                </div>
            </vue-autosuggest>
        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            query: "",
            selected: "",
            suggestions: [
                {
                    data: {
                        bedrijf: [
                            {
                                id: 1,
                                handelsnaam: "Geen bedrijf gevonden in het KvK register",
                            },
                        ]
                    }
                }
            ]
        };
    },
    computed: {
        filteredOptions() {
            return [
                {
                    data: this.suggestions[0].data.bedrijf.filter(option => {

                        return option.handelsnaam.toLowerCase().indexOf(this.query.toLowerCase()) > -1;
                    })
                }
            ];
        }
    },
    methods: {
        onSelected(item) {
            this.selected = item.item;
        },
        onInputChange(text) {
            text = text.replace(/\s+/g, '%20').toLowerCase();
            if (text.length > 3) {
                axios.get('/search-for-company/' + text)
                    .then(response => {
                        this.suggestions[0].data.bedrijf = response.data._embedded.bedrijf;
                        console.log(response.data._embedded.bedrijf)
                    })
            }
        },
        /**
         * This is what the <input/> value is set to when you are selecting a suggestion.
         */
        getSuggestionValue(suggestion) {
            return suggestion.item.handelsnaam;
        }
    }
}
</script>

<style scoped>

</style>
