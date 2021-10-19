//LIBS
require('./bootstrap');
window.Swal = require('sweetalert2');

//UTILS
window.Usage = require('./Utils/Usage');

//PAGES
window.Empresas = require('./Pages/Empresas');
window.Documentos = require('./Pages/Documentos');
window.TipoDocumento = require('./Pages/TipoDocumento');

$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
    },
}) 



