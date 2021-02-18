<template>
    <div class="container">
        <div class="row">
                <div class="panel panel-default">
                    <h2 class="inline-block text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                        Product configurator
                    </h2>
                    <p class="inline-block float-right" v-if="value && products.items[0] && checked.length && inputName && valueConnect && productsToConnect.items[0] && checkedConnect.length">
<!--                        <label for="price"></label>-->
<!--                        <input type="number" step="0.01" id="price" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">-->
                        <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        Opslaan</button></p>
                    <div class="panel-body grid xs:grid-cols-1 sm:grid-cols-3 gap-8 mt-3">
                        <div>
                            <SelectTree :options="options" v-model="value" @input="getProducts(value)" />

                            <ul class="mb-4 pl-3" v-if="products.items[0]">
                                <input v-model="checked" type="checkbox" name="product[]" :id="value" :value="value">
                                <label for="9999">Alle producten in deze categorie.</label>
                                <li v-for="product in products.items">
                                    <input :disabled="checked.includes(value)"
                                           name="checkboxes" v-model="checked" type="checkbox" :value="product.id"
                                           :id="product.id">
                                    <label :for="product.id">{{ product.name }}  - €{{ product.price }}</label>
                                </li>
                            </ul>

                            <p class="mb-4 pl-3 text-gray-500" v-else>Geen producten gevonden in de geselecteerde
                                categorie.</p>
                        </div>

                        <div v-if="value && products.items[0] && checked.length">
                            <label>
                                <input type="text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full"
                                       v-model="inputName"
                                       placeholder="Naam van koppeling, 'Eindverbinding linkerkant' bijvoorbeeld"
                                       required>
                            </label>
                        </div>

                        <div v-if="value && products.items[0] && checked.length && inputName">
                            <SelectTree :options="options" v-model="valueConnect" @input="getProducts(valueConnect, 'productsToConnect')" >
                            </SelectTree>

                        <ul class="mb-4 pl-3" v-if="productsToConnect.items[0]">
                            <input v-model="checkedConnect" type="checkbox" name="product[]" :id="valueConnect" :value="valueConnect">
                            <label for="con-9999">Alle producten in deze categorie.</label>
                            <li v-for="product in productsToConnect.items">
                                <input :disabled="checkedConnect.includes(valueConnect)"
                                       name="checkboxes" v-model="checkedConnect" type="checkbox" :value="'con-'+product.id"
                                       :id="'con-'+product.id">
                                <label :for="'con-'+product.id">{{ product.name }} - €{{ product.price }}</label>
                            </li>
                        </ul></div>
                    </div>
                </div>
        </div>
    </div>
</template>

<script>
import SelectTree from "./SelectTree";

export default {
    components: {SelectTree},

    data() {
        return {
            checked: [],
            checkedConnect: [],
            value: null,
            valueConnect: null,
            options: [],
            inputName: null,
            category: null,
            products: {
                items: []
            },
            productsToConnect: {
                items: []
            }
        }
    },
    methods: {
        getProducts(category, productChoice =  'products') {
            axios.get('/categories/' + category + '/products')
                .then(response => {
                    if(productChoice === 'products'){
                        this.products = response.data
                        this.checked = []
                    } else if(productChoice === 'productsToConnect') {
                        this.productsToConnect = response.data
                    }
                })
        },
    },
    watch: {
        checked: function () {
            if (this.checked.includes(this.value) && this.checked.length > 1) {
                this.checked = [this.value]
            }
        },
        checkedConnect: function () {
            if (this.checkedConnect.includes(this.valueConnect) && this.checkedConnect.length > 1) {
                this.checkedConnect = [this.valueConnect]
            }
        }
    },
    mounted() {
        axios.get('/categories/tree')
            .then(response => {
                this.options = response.data.root_categories
            })
    },
    computed: {}
}
</script>

<style scoped>

</style>
