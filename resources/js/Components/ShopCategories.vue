<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form>
                            <SelectTree :options="options" v-model="value" @input="getProducts(value)">
                            </SelectTree>
                            <ul class="mb-4 pl-3" v-if="products.items[0]">
                                    <input type="checkbox" name="product[]" id="9999">
                                    <label for="9999">Alle producten in deze categorie.</label>
                                <li v-for="product in products.items">
                                    <input type="checkbox" name="product[]" :id="product.id">
                                    <label :for="product.id">{{ product.name }}</label>
                                </li>
                            </ul>
                            <p class="mb-4 pl-3" v-else>Geen producten gevonden in de geselecteerde categorie.</p>

                            <label>
                                <input type="text" class="w-full" placeholder="Naam van koppeling, 'Eindverbinding linkerkant' bijvoorbeeld" required>
                            </label>
                            <SelectTree :options="options">
                            </SelectTree>
                        </form>
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
            value: '',
            options: [],
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
