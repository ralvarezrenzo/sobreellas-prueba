var nombre = document.querySelector('#nombre'); 
var email  = document.querySelector('#email'); 
var ciudad = document.querySelector('#ciudad'); 
var telf   = document.querySelector('#telf');
var enviar = document.querySelector('#enviar'); 
var pedido = document.querySelector('#pedido'); 
var formulario = document.querySelector('#formulario'); 

function validarEmail(direccion) {
    var pattron = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,7})$/i; 
    return pattron.test(direccion.trim());
}
function validarNumero(numero) {
    var patron = /^([\d\-\(\)\+\*\#]+)$/;
    return patron.test(numero.trim());
}
function esta_vacio(elementos) {
    console.log(elementos);
    var numero_elementos = elementos.length
    for (let index = 0; index < numero_elementos; index++) {
        if (elementos[index].trim().length < 1) {
            return false;
        }
    }
    return true;
}

enviar.addEventListener('click', function () {  
    if(esta_vacio([nombre.value, ciudad.value, pedido.value]) && validarEmail(email.value) &&  validarNumero(telf.value)) {
        formulario.submit();
    } else { 
    Toastify({
        text: "Verifique que todos los datos agregados sean correctos",
        duration: 7000,
        gravity: "top", // `top` or `bottom`
        position: 'center', // `left`, `center` or `right`
        backgroundColor: "rgb(233, 172, 41)",
        }).showToast();    
    }
});
