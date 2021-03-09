<template>
    <div>
        <treeselect :label="name" class="hover:border hover:border-blue-600"
                    name="category"
                    noOptionsText="Er zijn geen categorieën"
                    placeholder="Kies een categorie" @input="changeCategory()"
                    noResultsText="Geen data beschikbaar" noChildrenText="Geen verdere categorieën"
                    v-model="value" :value="value" :multiple="false" :normalizer="normalizer" :options="options"/>

    </div>

</template>

<script>

import Treeselect from '@riophae/vue-treeselect'

import '@riophae/vue-treeselect/dist/vue-treeselect.css'

export default {
    components: {Treeselect},
    name: "SelectTree",
    props: {
        selected: {
            required: false,
            default: null
        }
    },
    data() {
        return {
            options: [],
            value: null,
            name: '',
        }
    },
    methods: {
        changeCategory(){
            this.$emit('input', this.value);
        },
        normalizer(node) {
            return {
                id: node.id,
                label: node.name,
                children: node.children,
            }
        }
    },
    mounted () {
        if(this.options.length === 0){
            axios.get('/categories/tree')
                .then(response => {
                    this.options = response.data.root_categories
                }).then(()=>{
                    if(this.selected){
                        this.value = this.selected
                    }
            })
        }
    }
}
</script>

<style scoped>

</style>
