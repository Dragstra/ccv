(self.webpackChunk=self.webpackChunk||[]).push([[173],{6173:(e,t,n)=>{"use strict";n.r(t),n.d(t,{default:()=>o});const s={data:function(){return{query:"",selected:"",suggestions:[{data:{bedrijf:[{id:1,handelsnaam:"Geen bedrijf gevonden in het KvK register"}]}}]}},computed:{filteredOptions:function(){var e=this;return[{data:this.suggestions[0].data.bedrijf.filter((function(t){return t.handelsnaam.toLowerCase().indexOf(e.query.toLowerCase())>-1}))}]}},methods:{onSelected:function(e){this.selected=e.item},onInputChange:function(e){var t=this;(e=e.replace(/\s+/g,"%20").toLowerCase()).length>3&&axios.get("/search-for-company/"+e).then((function(e){t.suggestions[0].data.bedrijf=e.data._embedded.bedrijf,console.log(e.data._embedded.bedrijf)}))},getSuggestionValue:function(e){return e.item.handelsnaam}}};const o=(0,n(1900).Z)(s,(function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{staticClass:"mt-4"},[n("label",{attrs:{for:"company_name"}},[e._v("Bedrijf")]),e._v(" "),n("div",{staticClass:"autosuggest-container"},[n("vue-autosuggest",{attrs:{suggestions:e.filteredOptions,name:"company-name","get-suggestion-value":e.getSuggestionValue,"input-props":{id:"autosuggest__input",class:"rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"}},on:{input:e.onInputChange,selected:e.onSelected},scopedSlots:e._u([{key:"default",fn:function(t){var s=t.suggestion;return n("div",{},[n("div",{staticStyle:{"{ display":"'flex', color: 'navyblue'}"}},[e._v(e._s(s.item.handelsnaam))])])}}]),model:{value:e.query,callback:function(t){e.query=t},expression:"query"}})],1)])}),[],!1,null,"21c96c6a",null).exports},1900:(e,t,n)=>{"use strict";function s(e,t,n,s,o,i,a,r){var d,u="function"==typeof e?e.options:e;if(t&&(u.render=t,u.staticRenderFns=n,u._compiled=!0),s&&(u.functional=!0),i&&(u._scopeId="data-v-"+i),a?(d=function(e){(e=e||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(e=__VUE_SSR_CONTEXT__),o&&o.call(this,e),e&&e._registeredComponents&&e._registeredComponents.add(a)},u._ssrRegister=d):o&&(d=r?function(){o.call(this,(u.functional?this.parent:this).$root.$options.shadowRoot)}:o),d)if(u.functional){u._injectStyles=d;var c=u.render;u.render=function(e,t){return d.call(t),c(e,t)}}else{var l=u.beforeCreate;u.beforeCreate=l?[].concat(l,d):[d]}return{exports:e,options:u}}n.d(t,{Z:()=>s})}}]);