/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/main.js":
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _search_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./search.js */ "./resources/js/search.js");
/* harmony import */ var _route_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./route.js */ "./resources/js/route.js");


$(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var search = new _search_js__WEBPACK_IMPORTED_MODULE_0__["default"]();
  search.init();
  $('.image-thumb').click(function () {
    var $container = $(this).closest('.product-images-slider');
    $container.find('.image-thumb').removeClass('active');
    $(this).addClass('active');
    var image_src = $(this).data('img_src');
    $container.find('.images-main img').attr('src', image_src);
  });
});

/***/ }),

/***/ "./resources/js/route.js":
/*!*******************************!*\
  !*** ./resources/js/route.js ***!
  \*******************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* export default binding */ __WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _routes_json__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./routes.json */ "./resources/js/routes.json");

/* harmony default export */ function __WEBPACK_DEFAULT_EXPORT__() {
  var args = Array.prototype.slice.call(arguments);
  var name = args.shift();
  if (_routes_json__WEBPACK_IMPORTED_MODULE_0__[name] === undefined) {
    console.log('Error');
  } else {
    return '/' + _routes_json__WEBPACK_IMPORTED_MODULE_0__[name].split('/').map(function (str) {
      return str[0] == "{" ? args.shift() : str;
    }).join('/');
  }
}

/***/ }),

/***/ "./resources/js/routes.json":
/*!**********************************!*\
  !*** ./resources/js/routes.json ***!
  \**********************************/
/***/ ((module) => {

module.exports = /*#__PURE__*/JSON.parse('{"":"api/user","sanctum.csrf-cookie":"sanctum/csrf-cookie","axios.forms.loader":"axios/forms/load","axios.forms.processor":"axios/forms/process","axios.forms.field.loader":"axios/forms/fields/load","ignition.healthCheck":"_ignition/health-check","ignition.executeSolution":"_ignition/execute-solution","ignition.updateConfig":"_ignition/update-config","api.admin.attachments.add":"api/admin/attachments/add","api.cart.actions":"api/cart/actions","api.favorites.actions":"api/favorites/actions","admin.login":"admin/login","admin.auth":"admin/login","logout":"logout","admin":"admin","admin.errors.404":"admin/404","admin.orders":"admin/orders","admin.orders.edit":"admin/orders/edit/{id}","admin.orders.update":"admin/orders/update/{id}","admin.categories":"admin/categories","admin.categories.add":"admin/categories/add","admin.categories.store":"admin/categories/store","admin.categories.edit":"admin/categories/edit/{id}","admin.categories.update":"admin/categories/update/{id}","admin.categories.delete":"admin/categories/delete/{id}","admin.products":"admin/products","admin.products.add":"admin/products/add","admin.products.store":"admin/products/store","admin.products.edit":"admin/products/edit/{id}","admin.products.update":"admin/products/update/{id}","admin.products.delete":"admin/products/delete/{id}","admin.users":"admin/users","admin.users.add":"admin/users/add","admin.users.store":"admin/users/store","admin.users.edit":"admin/users/edit/{id}","admin.users.update":"admin/users/update/{id}","admin.users.delete":"admin/users/delete/{id}","admin.users.auth":"admin/users/auth/{id}","admin.settings":"admin/settings","admin.settings.payments":"admin/settings/payments","admin.logout":"admin/logout","login":"login","auth":"login","home":"/","catalog":"catalog","catalog.category":"catalog/{alias}","categories.subcategory":"catalog/{alias}/{subcategory_alias}","products":"products","products.product":"products/{alias}","products.reviews.add":"products/{alias}/reviews/add","products.reviews.store":"products/{alias}/reviews/add","search":"search","favorites":"favorites","cart":"cart","cart.checkout":"checkout","cart.add_order":"checkout","order.pay":"pay/{order_date}","payments.custom.pay":"payments/custom/pay/{order_id}","payments.custom.success":"payments/custom/success","admin.settings.payments.custom":"admin/settings/payments/custom","admin.settings.payments.custom.update":"admin/settings/payments/custom/update"}');

/***/ }),

/***/ "./resources/js/search.js":
/*!********************************!*\
  !*** ./resources/js/search.js ***!
  \********************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Search)
/* harmony export */ });
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _classCallCheck(a, n) { if (!(a instanceof n)) throw new TypeError("Cannot call a class as a function"); }
function _defineProperties(e, r) { for (var t = 0; t < r.length; t++) { var o = r[t]; o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, _toPropertyKey(o.key), o); } }
function _createClass(e, r, t) { return r && _defineProperties(e.prototype, r), t && _defineProperties(e, t), Object.defineProperty(e, "prototype", { writable: !1 }), e; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : i + ""; }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
var Search = /*#__PURE__*/function () {
  function Search() {
    _classCallCheck(this, Search);
  }
  return _createClass(Search, [{
    key: "init",
    value: function init() {
      this.events();
    }
  }, {
    key: "events",
    value: function events() {
      var search = this;
      $('#form-search input').on("focus", function () {
        search.btnClearDisplay();
      }).on("blur", function () {
        setTimeout(function () {
          if (!$('#form-search input').is(':focus')) {
            search.btnClearDisplay(1);
          }
        }, 100);
      }).on("input", function () {
        search.btnClearDisplay();
      });
      $('.search-wrap .search__icon-clear').click(function () {
        $('#form-search input').val('').focus();
      });
      $('.search-wrap .search__icon-search').click(function () {
        if ($('#form-search input').val()) {
          $('#form-search').submit();
        }
      });
    }
  }, {
    key: "btnClearDisplay",
    value: function btnClearDisplay() {
      var to_hide = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
      var to_active = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
      if (to_hide) {
        $('#form-search .search__icon-clear').removeClass('active');
      } else if (to_active) {
        $('#form-search .search__icon-clear').addClass('active');
      } else if ($('#form-search input').val()) {
        $('#form-search .search__icon-clear').addClass('active');
      } else {
        $('#form-search .search__icon-clear').removeClass('active');
      }
    }
  }]);
}();


/***/ }),

/***/ "./resources/sass/cart-modal.scss":
/*!****************************************!*\
  !*** ./resources/sass/cart-modal.scss ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/cart.scss":
/*!**********************************!*\
  !*** ./resources/sass/cart.scss ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/categories.scss":
/*!****************************************!*\
  !*** ./resources/sass/categories.scss ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/extensions/trainings/categories.scss":
/*!*************************************************************!*\
  !*** ./resources/sass/extensions/trainings/categories.scss ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/extensions/trainings/trainings.scss":
/*!************************************************************!*\
  !*** ./resources/sass/extensions/trainings/trainings.scss ***!
  \************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/header.scss":
/*!************************************!*\
  !*** ./resources/sass/header.scss ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/main.scss":
/*!**********************************!*\
  !*** ./resources/sass/main.scss ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/product-card.scss":
/*!******************************************!*\
  !*** ./resources/sass/product-card.scss ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/product-reviews.scss":
/*!*********************************************!*\
  !*** ./resources/sass/product-reviews.scss ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/products.scss":
/*!**************************************!*\
  !*** ./resources/sass/products.scss ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/scripts": 0,
/******/ 			"css/style": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunklaravel_shop"] = self["webpackChunklaravel_shop"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/style"], () => (__webpack_require__("./resources/js/main.js")))
/******/ 	__webpack_require__.O(undefined, ["css/style"], () => (__webpack_require__("./resources/sass/main.scss")))
/******/ 	__webpack_require__.O(undefined, ["css/style"], () => (__webpack_require__("./resources/sass/header.scss")))
/******/ 	__webpack_require__.O(undefined, ["css/style"], () => (__webpack_require__("./resources/sass/categories.scss")))
/******/ 	__webpack_require__.O(undefined, ["css/style"], () => (__webpack_require__("./resources/sass/products.scss")))
/******/ 	__webpack_require__.O(undefined, ["css/style"], () => (__webpack_require__("./resources/sass/product-card.scss")))
/******/ 	__webpack_require__.O(undefined, ["css/style"], () => (__webpack_require__("./resources/sass/product-reviews.scss")))
/******/ 	__webpack_require__.O(undefined, ["css/style"], () => (__webpack_require__("./resources/sass/cart.scss")))
/******/ 	__webpack_require__.O(undefined, ["css/style"], () => (__webpack_require__("./resources/sass/cart-modal.scss")))
/******/ 	__webpack_require__.O(undefined, ["css/style"], () => (__webpack_require__("./resources/sass/extensions/trainings/categories.scss")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/style"], () => (__webpack_require__("./resources/sass/extensions/trainings/trainings.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;