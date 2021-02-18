(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Components_ChamberOfCommerceInputField_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/ChamberOfCommerceInputField.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/ChamberOfCommerceInputField.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => __WEBPACK_DEFAULT_EXPORT__
/* harmony export */ });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      query: "",
      selected: "",
      suggestions: [{
        data: {
          bedrijf: [{
            id: 1,
            handelsnaam: "Geen bedrijf gevonden in het KvK register"
          }]
        }
      }]
    };
  },
  computed: {
    filteredOptions: function filteredOptions() {
      var _this = this;

      return [{
        data: this.suggestions[0].data.bedrijf.filter(function (option) {
          return option.handelsnaam.toLowerCase().indexOf(_this.query.toLowerCase()) > -1;
        })
      }];
    }
  },
  methods: {
    onSelected: function onSelected(item) {
      this.selected = item.item;
    },
    onInputChange: function onInputChange(text) {
      var _this2 = this;

      text = text.replace(/\s+/g, '%20').toLowerCase();

      if (text.length > 3) {
        axios.get('/search-for-company/' + text).then(function (response) {
          _this2.suggestions[0].data.bedrijf = response.data._embedded.bedrijf;
          console.log(response.data._embedded.bedrijf);
        });
      }
    },

    /**
     * This is what the <input/> value is set to when you are selecting a suggestion.
     */
    getSuggestionValue: function getSuggestionValue(suggestion) {
      return suggestion.item.handelsnaam;
    }
  }
});

/***/ }),

/***/ "./resources/js/Components/ChamberOfCommerceInputField.vue":
/*!*****************************************************************!*\
  !*** ./resources/js/Components/ChamberOfCommerceInputField.vue ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => __WEBPACK_DEFAULT_EXPORT__
/* harmony export */ });
/* harmony import */ var _ChamberOfCommerceInputField_vue_vue_type_template_id_6152ec85_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ChamberOfCommerceInputField.vue?vue&type=template&id=6152ec85&scoped=true& */ "./resources/js/Components/ChamberOfCommerceInputField.vue?vue&type=template&id=6152ec85&scoped=true&");
/* harmony import */ var _ChamberOfCommerceInputField_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ChamberOfCommerceInputField.vue?vue&type=script&lang=js& */ "./resources/js/Components/ChamberOfCommerceInputField.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _ChamberOfCommerceInputField_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _ChamberOfCommerceInputField_vue_vue_type_template_id_6152ec85_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
  _ChamberOfCommerceInputField_vue_vue_type_template_id_6152ec85_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  "6152ec85",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Components/ChamberOfCommerceInputField.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/Components/ChamberOfCommerceInputField.vue?vue&type=script&lang=js&":
/*!******************************************************************************************!*\
  !*** ./resources/js/Components/ChamberOfCommerceInputField.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => __WEBPACK_DEFAULT_EXPORT__
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ChamberOfCommerceInputField_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./ChamberOfCommerceInputField.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/ChamberOfCommerceInputField.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ChamberOfCommerceInputField_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/Components/ChamberOfCommerceInputField.vue?vue&type=template&id=6152ec85&scoped=true&":
/*!************************************************************************************************************!*\
  !*** ./resources/js/Components/ChamberOfCommerceInputField.vue?vue&type=template&id=6152ec85&scoped=true& ***!
  \************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ChamberOfCommerceInputField_vue_vue_type_template_id_6152ec85_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
/* harmony export */   "staticRenderFns": () => /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ChamberOfCommerceInputField_vue_vue_type_template_id_6152ec85_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ChamberOfCommerceInputField_vue_vue_type_template_id_6152ec85_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./ChamberOfCommerceInputField.vue?vue&type=template&id=6152ec85&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/ChamberOfCommerceInputField.vue?vue&type=template&id=6152ec85&scoped=true&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/ChamberOfCommerceInputField.vue?vue&type=template&id=6152ec85&scoped=true&":
/*!***************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Components/ChamberOfCommerceInputField.vue?vue&type=template&id=6152ec85&scoped=true& ***!
  \***************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => /* binding */ render,
/* harmony export */   "staticRenderFns": () => /* binding */ staticRenderFns
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "mt-4" }, [
    _c("label", { attrs: { for: "company_name" } }, [_vm._v("Bedrijf")]),
    _vm._v(" "),
    _c(
      "div",
      { staticClass: "autosuggest-container" },
      [
        _c("vue-autosuggest", {
          attrs: {
            suggestions: _vm.filteredOptions,
            name: "company-name",
            "get-suggestion-value": _vm.getSuggestionValue,
            "input-props": {
              id: "autosuggest__input",
              class:
                "rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
            }
          },
          on: { input: _vm.onInputChange, selected: _vm.onSelected },
          scopedSlots: _vm._u([
            {
              key: "default",
              fn: function(ref) {
                var suggestion = ref.suggestion
                return _c("div", {}, [
                  _c(
                    "div",
                    {
                      staticStyle: { "{ display": "'flex', color: 'navyblue'}" }
                    },
                    [_vm._v(_vm._s(suggestion.item.handelsnaam))]
                  )
                ])
              }
            }
          ]),
          model: {
            value: _vm.query,
            callback: function($$v) {
              _vm.query = $$v
            },
            expression: "query"
          }
        })
      ],
      1
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => /* binding */ normalizeComponent
/* harmony export */ });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () {
        injectStyles.call(
          this,
          (options.functional ? this.parent : this).$root.$options.shadowRoot
        )
      }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ })

}]);