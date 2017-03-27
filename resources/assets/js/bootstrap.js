window.$ = window.jQuery = require('jquery');

window.Vue = require('vue/dist/vue.js');
window.toastr = require('toastr');

window.axios = require('axios');

window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
};

window.axios.interceptors.response.use(function (response) {

    if (response.data.redirect)
        location.href = response.data.redirect

    if (response.data.flash) {
        window.toastr[response.data.flash.level || 'success'](response.data.flash.message)
    }

    return response;
}, function (error) {
    return Promise.reject(error);
});