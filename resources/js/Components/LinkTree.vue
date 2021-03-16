<template>
    <div>
        <div class="flex items-start">
        <treeselect v-model="value" :label="name"
                    :multiple="false"
                    ref="linkInput"
                    :normalizer="normalizer" :options="options"
                    @input="changeLink()"
                    class=" hover:border hover:border-blue-600 w-3/4 inline-block "
                    noChildrenText="Geen verdere links" noOptionsText="Er zijn geen (verdere) links beschikbaar" noResultsText="Geen data beschikbaar" placeholder="Kies een link"/>
            <transition name="fade">
                <button v-if="value" class="bg-red-500 hover:bg-red-400 text-white font-bold py-1 px-2 border-b-4 border-red-700 hover:border-red-500" @click="deleteLink">Delete</button>
            </transition>
        </div>
        <div>
            <input v-model="name" type="text" class="w-75 rounded-md shadow-sm border-0 focus:ring focus:ring-indigo-100 focus:ring-opacity-70"><button @click="postLink()">Toevoegen</button>
        </div>
    </div>
</template>

<script>
import Treeselect from '@riophae/vue-treeselect'

import '@riophae/vue-treeselect/dist/vue-treeselect.css'


export default {
    links: [],
    props: {
        selected: {
            type: String
        }
    },
    components: {Treeselect},
    name: "LinkTree",

    data() {
        return {
            value: null,
            name: null,
            options: []
        }
    },
    methods: {
        changeLink() {
            this.$emit('input', this.value);
        },
        normalizer(node) {
            return {
                id: node.id,
                label: node.name,
                parent_id: node.parent_id,
            }
        },
        deleteLink() {
          if(this.value) {
              axios.delete('/links/'+this.value, {
                  data: {
                    id: this.value
                  }
              }).then( r => {
                  this.flashMessage.info({
                      title: r.data.title,
                      message: r.data.message,
                      time: 5000,
                      icon: ''
                  });
                  this.getLinkData()
                  this.changeLink();
                  this.value = null;
              }).catch(e => {
                  this.flashMessage.error({
                      title: 'Er gaat iets niet goed.',
                      message: 'Waarschijnlijk zijn er producten gekoppeld aan deze link. Verwijder deze eerst.',
                      time: 5000,
                  })
              })
          } else {
              this.flashMessage.warning({
                  title: 'Geen keuze gemaakt',
                  message: 'Kies een link om het te verwijderen.',
                  time: 5000,
              })
          }
        },
        postLink() {
            if(this.name !== null) {
                axios.post('/links', {
                    name: this.name,
                    parent_id: this.value
                }).then(r => {
                    this.flashMessage.success({
                        title: 'Link toegevoegd.',
                        message: 'Je kunt nu de toegevoegde link gebruiken!',
                        time: 5000,
                        icon: ''
                    });
                    this.getLinkData()
                    this.changeLink();
                    this.name = null;
                })
                .catch(e => {
                this.flashMessage.error({
                    title: 'Er gaat iets niet goed.',
                    message: 'Geef deze foutcode door bij het melden alstublieft: '+e,
                    time: 5000,
                });
                })
            } else {
                this.flashMessage.warning({
                    title: 'Linknaam',
                    message: 'Je vergeet een naam mee te geven aan de nieuwe link.',
                    time: 5000,
                });
            }
        },
        getLinkData(){
            axios.get('/links')
                .then(response => {
                    this.options = response.data
                })
        }
    },
    mounted() {
        this.getLinkData()
    },
}
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
    transition: opacity .7s;
}
.fade-enter, .fade-leave-to {
    opacity: 0;
}
</style>
