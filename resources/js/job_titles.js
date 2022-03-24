$(function() {

    // obtener campos ocultar div
    var checkbox = $(".checkshow");
    var hidden = $(".div_a_mostrar");
    //var populate = $("#populate");

    hidden.hide();
       checkbox.change(function() {
           if (checkbox.is(':checked')) {
          //hidden.show();
              $(".div_a_mostrar").fadeIn("200")
            } else {
               //hidden.hide();
      $(".div_a_mostrar").fadeOut("200")
               $("#bonus").val(""); // limpia los valores de lols input al ser ocultado
               $('input[type=checkbox]').prop('checked',false);// limpia los valores de checkbox al ser ocultado

      }
    });
  });

  // Validaciones de Jquery

  $(document).ready(function() {
    $("#form-crear").validate({
        rules: {
            code_job:{
                required: true,
                remote:{
                    url: "/validate-job",
                    data: {
                        job_id: function () {
                            return $("#job_id").val();
                        },
                    },
                }
            },
            name:{
                required: true,
            },
            salary:{
                required: true,
                min: 2716,
            },
            'campus[]':{
                required: true,
            },
            bonus:{
                min: 250,
            }
        },
        messages:{
            code_job:{
                required: "Ingrese un codigo unico al puesto",
                remote: "El código que ingreso ya existe, ingrese otro."
            },
            name:{
                required: "Ingrese el nombre del puesto",
            },
            salary:{
                required: "Ingrese el salario del puesto",
                min: "El salario minimo es Q. 2716",
            },
            'campus[]':{
                required: "Ingrese un programa/sede al puesto",
            },
            bonus:{
                min: "El bonus debe ser mayor a Q. 250",
            },
            errorElement: 'span',
        }
    });
    });

    $(document).ready(function() {
        $("#form-editar").validate({
            rules: {
                code_job:{
                    required: true,
                    remote:{
                        url: "/validate-job",
                        data: {
                            job_id: function () {
                                return $("#job_id").val();
                            },
                        },
                    }
                },
                name:{
                    required: true,
                },
                salary:{
                    required: true,
                    min: 2716,
                },
                bonus:{
                    min: 250,
                }
            },
            messages:{
                code_job:{
                    required: "Ingrese un codigo unico al puesto",
                    remote: "El código que ingreso ya existe, ingrese otro."
                },
                name:{
                    required: "Ingrese el nombre del puesto",
                },
                salary:{
                    required: "Ingrese el salario del puesto",
                    min: "El salario minimo es Q. 2716",
                },
                bonus:{
                    min: "El bonus debe ser mayor a Q. 250",
                },
                errorElement: 'span',
            }
        });
        });
