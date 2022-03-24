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
})(jQuery);

//VALIDATION

$("#form-empleado").validate({
  rules: {
    name: {
      required: true,
    },
    last_name: {
      required: true,
    },
    cui: {
      required: true,
      remote: {
        url: "/validate-cui",
        data: {
          cui_id: function () {
            return $("#cui_id").val();
          },
        },
      },
      minlength: 13,
      max: 9999999999999,
      number: true,
    },
    address: {
      required: true,
    },
    date_birth: {
      required: true,
    },
    phone_number: {
      required: true,
      minlength: 8,
    },
    nit: {
      required: true,
      remote: {
        url: "/validate-nit",
        data: {
          nit_id: function () {
            return $("#nit_id").val();
          },
        },
      },
      minlength: 9,
      maxlength: 10,
    },
    payment: {
      required: true,
    },
    job_id: {
      required: true,
    },
    gender: {
      required: true,
    },
    marital_status: {
      required: true,
    },
    bank_account: {
      required: true,
    },
    bank: {
      required: true,
    },
    igss: {
      required: true,
    },
    percentage_igss: {
      required: true,
    },
  },
  messages: {
    name: {
      required: "Ingrese el nombre del empleado",
    },
    last_name: {
      required: "Ingrese el apellido del empleado",
    },

    cui: {
      required: "Ingrese el DPI del empleado",
      remote:
        "El DPI que ingreso ya existe en nuestros registros, por favor ingrese uno diferente.",
      minlength: "ingrese un número de DPI valido",
      max: "El número de DPI no es valido",
      number: "Solo se aceptan números",
    },
    address: {
      required: "Ingrese la dirección del empleado",
    },
    date_birth: {
      required: "Ingrese la fecha de nacimiento del empleado",
    },
    phone_number: {
      required: "Ingrese el número de celular del empleado",
      minlength: "ingrese un número de teléfono valido",
    },
    home_phone: {
      required: "Ingrese el número de casa del empelado",
    },
    nit: {
      required: "Ingrese el NIT del empleado",
      remote:
        "El NIT que ingreso ya existe en nuestros registros, por favor ingrese uno diferente.",
      minlength: "ingrese un NIT valido",
      maxlength: "ingrese un NIT valido",
    },
    payment: {
      required: "Ingrese el medio de pago para el empleado",
    },
    job_id: {
      required: "Ingrese el puesto del empleado",
    },
    gender: {
      required: "Ingrese el género del empleado",
    },
    marital_status: {
      required: "Ingrese el estado civil del empleado",
    },
    bank_account: {
      required: "Ingrese el número de cuenta del empleado",
    },
    bank: {
      required: "Ingrese el banco del empleado",
    },
    igss: {
      required: "Ingrese el número de IGSS del empleado",
    },
    percentage_igss: {
      required: "Ingrese el porcentaje de IGSS del empleado",
    },
    errorElement: "span",
  },
});
