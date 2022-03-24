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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/job_titles.js":
/*!************************************!*\
  !*** ./resources/js/job_titles.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  // obtener campos ocultar div
  var checkbox = $(".checkshow");
  var hidden = $(".div_a_mostrar"); //var populate = $("#populate");

  hidden.hide();
  checkbox.change(function () {
    if (checkbox.is(':checked')) {
      //hidden.show();
      $(".div_a_mostrar").fadeIn("200");
    } else {
      //hidden.hide();
      $(".div_a_mostrar").fadeOut("200");
      $("#bonus").val(""); // limpia los valores de lols input al ser ocultado

      $('input[type=checkbox]').prop('checked', false); // limpia los valores de checkbox al ser ocultado
    }
  });
}); // Validaciones de Jquery

$(document).ready(function () {
  $("#form-crear").validate({
    rules: {
      code_job: {
        required: true,
        remote: {
          url: "/validate-job",
          data: {
            job_id: function job_id() {
              return $("#job_id").val();
            }
          }
        }
      },
      name: {
        required: true
      },
      salary: {
        required: true,
        min: 2716
      },
      'campus[]': {
        required: true
      },
      bonus: {
        min: 250
      }
    },
    messages: {
      code_job: {
        required: "Ingrese un codigo unico al puesto",
        remote: "El código que ingreso ya existe, ingrese otro."
      },
      name: {
        required: "Ingrese el nombre del puesto"
      },
      salary: {
        required: "Ingrese el salario del puesto",
        min: "El salario minimo es Q. 2716"
      },
      'campus[]': {
        required: "Ingrese un programa/sede al puesto"
      },
      bonus: {
        min: "El bonus debe ser mayor a Q. 250"
      },
      errorElement: 'span'
    }
  });
});
$(document).ready(function () {
  $("#form-editar").validate({
    rules: {
      code_job: {
        required: true,
        remote: {
          url: "/validate-job",
          data: {
            job_id: function job_id() {
              return $("#job_id").val();
            }
          }
        }
      },
      name: {
        required: true
      },
      salary: {
        required: true,
        min: 2716
      },
      bonus: {
        min: 250
      }
    },
    messages: {
      code_job: {
        required: "Ingrese un codigo unico al puesto",
        remote: "El código que ingreso ya existe, ingrese otro."
      },
      name: {
        required: "Ingrese el nombre del puesto"
      },
      salary: {
        required: "Ingrese el salario del puesto",
        min: "El salario minimo es Q. 2716"
      },
      bonus: {
        min: "El bonus debe ser mayor a Q. 250"
      },
      errorElement: 'span'
    }
  });
});

/***/ }),

/***/ 2:
/*!******************************************!*\
  !*** multi ./resources/js/job_titles.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\ferna\OneDrive\Documentos\2022\rrhh\resources\js\job_titles.js */"./resources/js/job_titles.js");


/***/ })

/******/ });