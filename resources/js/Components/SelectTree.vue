<template>
    <div>
        <treeselect :label="name"
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
    category: [],
    props: {
        options: {
            type: Array,
            default: () => ({}),
        },
        selected: {
            type: String
        }
    },
    components: {Treeselect},
    name: "SelectTree",

    data() {
        return {
            value: '',
            name: '',
        }
    },
    methods: {
        changeCategory(){
            console.log(this.value);
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
        console.log(this.options)
    }
}
</script>

<style scoped>

</style>
