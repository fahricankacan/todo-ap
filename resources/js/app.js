

require('./bootstrap');

window.swal = require('sweetalert2');

mix.copy('node_modules\sweetalert2\dist\sweetalert2.js', 'public/js/sweetalert2.js');
mix.copy('node_modules\sweetalert2\dist\sweetalert2.css', 'public/js/sweetalert2.css');
