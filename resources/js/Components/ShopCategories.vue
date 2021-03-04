<template>
    <div class="container">
        <FlashMessage :position="'right top'" :y="-500"></FlashMessage>
        <div class="row">
            <div class="panel panel-default">
                <h2 class="inline-block text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate text-indigo-500">
                    Product configurator
                </h2>
                <p v-if="baseCategory && products.items[0] && checked.length && link && categoryToConnect && productsToConnect.items[0] && checkedConnect.length"
                   class="inline-block float-right">
                    <button @click="saveConfiguration"
                        class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        Opslaan
                    </button>
                </p>
                <div class="panel-body grid xs:grid-cols-1 sm:grid-cols-3 gap-8 mt-3">
                    <div>
                        <label v-if="checked.length < 1">Kies een categorie voor het basisproduct
                            <SelectTree v-model="baseCategory" :options="options" @input="getProducts(baseCategory)"/>
                        </label>

                        <ul v-if="products.items[0]" class="mb-4 pl-3">
                            <input id="all" v-model="checked" name="product[]" type="checkbox"
                                   value="9999" @change="allCheck=!allCheck">
                            <label for="all">Alle producten in deze categorie.</label>
                            <li v-for="product in products.items">
                                <input :id="product.id"
                                       v-model="checked" :disabled="allCheck" :value="product.id" name="checkboxes"
                                       type="checkbox">
                                <label :for="product.id">{{ product.name }} - €{{ product.price }}</label>
                            </li>
                        </ul>

                        <p v-else class="mb-4 pl-3 text-gray-500">Geen producten gevonden in de geselecteerde
                            categorie.</p>
                    </div>

                    <div v-if="baseCategory && products.items[0] && checked.length">
                        <label>Link
                            <LinkTree v-model="link" @input="setLinkId(link)"/>
                        </label>
                        <hr class="mb-4">
                        <label v-if="link" class="mb-4">Klant kan lengte bepalen
                            <input v-model="length"
                                   :checked="length"
                                   class="mb-4 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block"
                                   placeholder="Klant kan benodigde lengte aangeven"
                                   required
                                   type="checkbox">
                        </label>
                        <hr class="mb-4">
                        <label v-if="link">Extra prijs <br>
                            <input id="price"
                                   class="inline-block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                   step="0.1"
                                   type="number"
                                   v-model="price">
                            <span v-if="percentage" @click="percentage=!percentage">% (percentage)</span> <span
                                v-else @click="percentage=!percentage">€ (euro)</span>
                        </label>
                    </div>

                    <div v-if="baseCategory && products.items[0] && checked.length && link">
                        <label v-if="checkedConnect < 1">Kies een categorie voor het aanvullende product
                            <SelectTree v-model="categoryToConnect" :options="options"
                                        @input="getProducts(categoryToConnect, 'productsToConnect')">
                            </SelectTree>
                        </label>
                        <ul v-if="productsToConnect.items[0]" class="mb-4 pl-3">
                            <input :id="categoryToConnect" id="con-all" v-model="checkedConnect" name="product[]"
                                   type="checkbox"
                                   value="con-all" @change="allCheckConnected=!allCheckConnected">
                            <label for="con-all">Alle producten in deze categorie.</label>
                            <li v-for="product in productsToConnect.items">
                                <input :id="'con-'+product.id"
                                       v-model="checkedConnect" :disabled="allCheckConnected" :value="'con-'+product.id"
                                       name="checkboxes"
                                       type="checkbox">
                                <label :for="'con-'+product.id">{{ product.name }} - €{{ product.price }}</label>
                            </li>
                        </ul>
                        <p v-else class="mb-4 pl-3 text-gray-500">Geen producten gevonden in de geselecteerde
                            categorie.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SelectTree from "./SelectTree";
import LinkTree from "./LinkTree";

export default {
    components: {SelectTree, LinkTree},

    data() {
        return {
            checked: [],
            checkedConnect: [],
            allCheckConnected: false,
            allCheck: false,
            baseCategory: null,
            categoryToConnect: null,
            options: [],
            link: null,
            length: false,
            price: 10,
            percentage: false,
            products: {
                items: []
            },
            productsToConnect: {
                items: []
            },
        }
    },
    methods: {
        setLinkId(link) {
            this.link = link
        },
        getProducts(category, productChoice = 'products') {
            axios.get('/categories/' + category + '/products')
                .then(response => {
                    if (productChoice === 'products') {
                        this.products = response.data
                        this.checked = []
                    } else if (productChoice === 'productsToConnect') {
                        this.productsToConnect = response.data
                        this.checkedConnect = []
                    }
                })
        },
        saveConfiguration() {
            if (this.checked.length >= 1 && this.checkedConnect.length >= 1 && this.link) {
                axios.post('/configurators', {
                    products: this.checked,
                    productsToConnect: this.checkedConnect,
                    baseCategory: this.baseCategory,
                    link: this.link,
                    percentage: this.percentage,
                    length: this.length,
                    price: this.price
                }).then(r => {
                    this.flashMessage.success({
                        title: 'Product toegevoegd.',
                        message: r.data.message,
                        time: 5000,
                    });
                    this.checkedConnect = []
                    this.allCheckConnected = false
                }).catch(e => {
                    this.flashMessage.error({
                        title: 'Er gaat iets fout.',
                        message: e.message,
                        time: 5000,
                    });
                })
            } else {
                this.flashMessage.error({
                    title: 'Niet alles in juist ingevuld.',
                    message: 'Er zijn geen producten geselecteerd of een link ontbreekt.',
                    time: 5000,
                });
            }
        }
    },
    watch: {
        checked: function () {
            if (this.checked.includes("9999")) {
                this.checked = this.products.items.map(function (value) {
                    return value.id
                })
            }
        },
        checkedConnect: function () {
            if (this.checkedConnect.includes("con-all")) {
                this.checkedConnect = this.productsToConnect.items.map(function (value) {
                    return 'con-' + value.id
                })
            }
        }
    },
    mounted() {
        this.flashMessage.setStrategy('multiple');
        axios.get('/categories/tree')
            .then(response => {
                this.options = response.data.root_categories
            })
        // this.flashMessage.setStrategy('single');
    },
    computed: {}
}
</script>

<style scoped>

</style>
