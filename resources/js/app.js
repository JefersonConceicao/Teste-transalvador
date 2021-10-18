//LIBS
require('./bootstrap');
window.Swal = require('sweetalert2');

//UTILS
window.Usage = require('./Utils/Usage');

//PAGES
window.Usuarios = require('./Pages/Usuarios');

$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
    },
}) 



