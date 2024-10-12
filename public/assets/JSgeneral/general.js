// se inicializa y cierra cualquier modal
// agregar data-title, al boton donde se agrega el data-remote, para asignarle el titulo al modal
// están contenidos en modals.blade.php
// no-action fue agregado solo al modal de cerrar sesión, ya que ese es fijo
$('.modal').on('show.bs.modal', function (e) {
    var modal = $(this);
    var button = $(e.relatedTarget);
    modal.find('.modal-body').load(button.data('remote'));
    modal.find('form').attr('onsubmit', 'return false;');
});

$('.modal').on('hide.bs.modal', function (e) {
    var modal = $(this);
    if (modal.data('no-action') == undefined){
        modal.find('.modal-title').text('');
        modal.find('.modal-body').html('');
    }
});

// document.addEventListener('DOMContentLoaded', function() {
//     const observer = new MutationObserver(function(mutations) {
//         mutations.forEach(function(mutation) {
//             mutation.addedNodes.forEach(function(node) {
//                 if (node.tagName === 'FORM') {
//                     node.setAttribute('onsubmit', 'return false');
//                 }
//             });
//         });
//     });

//     observer.observe(document.body, { childList: true, subtree: true });
// });

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

