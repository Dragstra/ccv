<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <SelectTree :options="options" v-model="value" @input="getProducts(value)" />

                        <ul class="mb-4 pl-3" v-if="products.items[0]">
                            <input v-model="checked" type="checkbox" name="product[]" :id="value" :value="value">
                            <label for="9999">Alle producten in deze categorie.</label>
                            <li v-for="product in products.items">
                                <input :disabled="checked.includes(value)"
                                       name="checkboxes" v-model="checked" type="checkbox" :value="product.id"
                                       :id="product.id">
                                <label :for="product.id">{{ product.name }}</label>
                            </li>
                        </ul>

                        <p class="mb-4 pl-3 text-gray-500" v-else>Geen producten gevonden in de geselecteerde
                            categorie.</p>

                        <div v-if="value && products.items[0] && checked.length" class="mt-3">
                            <label>
                                <input type="text" class="w-full hover:border hover:border-blue-600"
                                       v-model="inputName"
                                       placeholder="Naam van koppeling, 'Eindverbinding linkerkant' bijvoorbeeld"
                                       required>
                            </label>
                        </div>

                        <div v-if="inputName" class="mt-3">
                            <SelectTree :options="options">
                            </SelectTree>
                        </div>

                    </div>
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
            value: null,
            options: [],
            inputName: null,
            category: null,
            products: {
                items: []
            }
        }
    },
    methods: {
        getProducts(category) {
            axios.get('/categories/' + category + '/products')
                .then(response => {

                    this.products = response.data
                    console.log(this.products)
                })
        },
    },
    watch: {
        checked: function () {
            if (this.checked.includes(this.value) && this.checked.length > 1) {
                this.checked = [this.value]
            }
        }
    },
    mounted() {
        axios.get('/categories/tree')
            .then(response => {
                this.options = response.data.root_categories
                console.log(response.data)
            })
    },
    computed: {}
}
</script>

<style scoped>

</style>
