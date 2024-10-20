// se inicializa y cierra cualquier modal
// agregar data-title, al boton donde se agrega el data-remote, para asignarle el titulo al modal
// están contenidos en modals.blade.php
// no-action fue agregado solo al modal de cerrar sesión, ya que ese es fijo


// $('.modal').on('show.bs.modal', function (e) {
//     var modal = $(this);
//     var button = $(e.relatedTarget);
//     modal.find('.modal-body').load(button.data('remote'));
//     modal.find('form').attr('onsubmit', 'return false;');
// });

// $('.modal').on('hide.bs.modal', function (e) {
//     var modal = $(this);
//     if (modal.data('no-action') == undefined){
//         modal.find('.modal-title').text('');
//         modal.find('.modal-body').html('');
//     }
// });


$('.modal').on('show.bs.modal', function (e) {
    var modal = $(this);
    var button = $(e.relatedTarget);
    
   
    modal.find('.modal-body').load(button.data('remote'), function () {
        initializeColorPicker(); 
        modal.find('form').attr('onsubmit', 'return false;');
    });
});

$('.modal').on('hide.bs.modal', function (e) {
    var modal = $(this);
    if (modal.data('no-action') == undefined) {
        modal.find('.modal-title').text('');
        modal.find('.modal-body').html('');
    }
});

let pickr; 

function initializeColorPicker() {
    if (pickr) pickr.destroy(); 

    const colorPickerElement = document.getElementById('color-picker');
    const colorInput = document.getElementById('color');

    if (!colorPickerElement) {
        console.warn('No se encontró el elemento #color-picker');
        return;
    }

    // pickr = Pickr.create({
    //     el: '#color-picker',
    //     theme: 'nano', 
    //     default: '#60a5fa', 
    //     components: {
    //         preview: true,
    //         opacity: true,
    //         hue: true,
    //         interaction: {
    //             hex: true,
    //             rgba: false,
    //             input: true,
    //             clear: false,
    //             save: true,
    //         }
    //     }
    // });

    // Simple example, see optional options for more configuration.
    pickr = Pickr.create({
    el: '.color-picker',
    theme: 'classic', // or 'monolith', or 'nano'

    swatches: [
        'rgba(244, 67, 54, 1)',
        'rgba(233, 30, 99, 0.95)',
        'rgba(156, 39, 176, 0.9)',
        'rgba(103, 58, 183, 0.85)',
        'rgba(63, 81, 181, 0.8)',
        'rgba(33, 150, 243, 0.75)',
        'rgba(3, 169, 244, 0.7)',
        'rgba(0, 188, 212, 0.7)',
        'rgba(0, 150, 136, 0.75)',
        'rgba(76, 175, 80, 0.8)',
        'rgba(139, 195, 74, 0.85)',
        'rgba(205, 220, 57, 0.9)',
        'rgba(255, 235, 59, 0.95)',
        'rgba(255, 193, 7, 1)'
    ],

    components: {

        // Main components
        preview: true,
        // opacity: true,
        // hue: true,

        // Input / output Options
        interaction: {
            // hex: true,
            // rgba: true,
            // hsla: true,
            // hsva: true,
            // cmyk: true,
            // input: true,
            // clear: true,
            save: true
        }
    }
});

    pickr.on('save', (color) => {
        colorInput.value = color.toHEXA().toString(); // Creo que este valor es el que podria servir para guardar el color manda el HEX a string
    });
}


function validaformulario(opcion)
{
   
    /*console.log(elementos);*/
    var modal_form = $('.modal-form').is(':visible');
    if (modal_form)
    {
        var form = '.modal-form';
    } else
    {
        var form = '.nomodal-form';
    }
    $(form).find('input[type=text], input[type=number], input[type=date], input[type=email], select, textarea').each(function(index, el) {
        if ($(this).data('no-action') == undefined) {
            if ($(this).val() == '') {
                $(this).removeClass('is-valid');
                $(this).addClass('is-invalid');
                //console.log($(this));
            } else {
                $(this).removeClass('is-invalid');
                $(this).addClass('is-valid');
            }
        }
    });

    if ( $('form .is-invalid').length > 0 ) {
        alertWarning('Faltan datos por capturar','Alerta');
        return false;
    } else{
        return true;
    }
}

$('.select2').select2();


function alertSuccess(mensaje = 'alerta', titulo = 'titulo') {
    Swal.fire({
        title: titulo,
        text: mensaje,
        icon: 'success',
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });
}

function alertError(mensaje = 'alerta', titulo = 'titulo') {
    Swal.fire({
        title: titulo,
        text: mensaje,
        icon: 'error',
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });
}

function alertWarning(mensaje = 'alerta', titulo = 'titulo') {
    Swal.fire({
        title: titulo,
        text: mensaje,
        icon: 'warning',
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });
}

function alertInfo(mensaje = 'alerta', titulo = 'titulo') {
    Swal.fire({
        title: titulo,
        text: mensaje,
        icon: 'info',
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });
}

function alertQuestion(mensaje = 'alerta', titulo = 'titulo') {
    Swal.fire({
        title: titulo,
        text: mensaje,
        icon: 'question',
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      });
}

function confirSave(titulo,callback) {
    Swal.fire({
        title: `${titulo}`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Aceptar"
    }).then((result) => {
        if (result.isConfirmed) {
            if (callback && typeof callback === 'function') {
                callback();
            }
        }
    });
}
