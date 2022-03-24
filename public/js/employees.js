/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/employees.js":
/*!***********************************!*\
  !*** ./resources/js/employees.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($) {
  "use strict";

  $("#date-nomina").hide();
  $("#payment").on("change", function () {
    var value = $(this).val();

    if (value == "nomina") {
      $("#date-nomina").slideDown("slow");
    } else {
      $("#date-nomina").slideUp("slow");
      $("#form-nomina").slideUp("slow");
    }
  });
})(jQuery); //VALIDATION


$("#form-empleado").validate({
  rules: {
    name: {
      required: true
    },
    last_name: {
      required: true
    },
    cui: {
      required: true,
      remote: {
        url: "/validate-cui",
        data: {
          cui_id: function cui_id() {
            return $("#cui_id").val();
          }
        }
      },
      minlength: 13,
      max: 9999999999999,
      number: true
    },
    address: {
      required: true
    },
    date_birth: {
      required: true
    },
    phone_number: {
      required: true,
      minlength: 8
    },
    nit: {
      required: true,
      remote: {
        url: "/validate-nit",
        data: {
          nit_id: function nit_id() {
            return $("#nit_id").val();
          }
        }
      },
      minlength: 9,
      maxlength: 10
    },
    payment: {
      required: true
    },
    job_id: {
      required: true
    },
    gender: {
      required: true
    },
    marital_status: {
      required: true
    },
    bank_account: {
      required: true
    },
    bank: {
      required: true
    },
    igss: {
      required: true
    },
    percentage_igss: {
      required: true
    }
  },
  messages: {
    name: {
      required: "Ingrese el nombre del empleado"
    },
    last_name: {
      required: "Ingrese el apellido del empleado"
    },
    cui: {
      required: "Ingrese el DPI del empleado",
      remote: "El DPI que ingreso ya existe en nuestros registros, por favor ingrese uno diferente.",
      minlength: "ingrese un número de DPI valido",
      max: "El número de DPI no es valido",
      number: "Solo se aceptan números"
    },
    address: {
      required: "Ingrese la dirección del empleado"
    },
    date_birth: {
      required: "Ingrese la fecha de nacimiento del empleado"
    },
    phone_number: {
      required: "Ingrese el número de celular del empleado",
      minlength: "ingrese un número de teléfono valido"
    },
    home_phone: {
      required: "Ingrese el número de casa del empelado"
    },
    nit: {
      required: "Ingrese el NIT del empleado",
      remote: "El NIT que ingreso ya existe en nuestros registros, por favor ingrese uno diferente.",
      minlength: "ingrese un NIT valido",
      maxlength: "ingrese un NIT valido"
    },
    payment: {
      required: "Ingrese el medio de pago para el empleado"
    },
    job_id: {
      required: "Ingrese el puesto del empleado"
    },
    gender: {
      required: "Ingrese el género del empleado"
    },
    marital_status: {
      required: "Ingrese el estado civil del empleado"
    },
    bank_account: {
      required: "Ingrese el número de cuenta del empleado"
    },
    bank: {
      required: "Ingrese el banco del empleado"
    },
    igss: {
      required: "Ingrese el número de IGSS del empleado"
    },
    percentage_igss: {
      required: "Ingrese el porcentaje de IGSS del empleado"
    },
    errorElement: "span"
  }
});

/***/ }),

/***/ 1:
/*!*****************************************!*\
  !*** multi ./resources/js/employees.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\ferna\OneDrive\Documentos\2022\rrhh\resources\js\employees.js */"./resources/js/employees.js");


/***/ })

/******/ });