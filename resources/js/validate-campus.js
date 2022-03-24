$("#formCampus").validate({
    rules: {
        code_campus: {
            required: true,
            remote: 
            {
                url: '/validate-campus',
                data: {
                    campus_id: function() {
                        return $( "#campus_id" ).val();
                    }
                }
            }            
        },
        name: {
            required: true,
            minlength: 5
        },
        state_id: {
            required: true
        },
        town_id: {
            required: true
        }
    }, 
    messages: {
        code_campus: {
            remote: "El código que ingreso ya existe en nuestros registros, por favor ingrese uno diferente.",
        }
    }
})