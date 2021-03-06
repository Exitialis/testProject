Vue.component('registration', {

    data() {
        return {
            errors: {},
            form: {
                name: null,
                phone: null,
                password: null,
            },
            loading: false,
        }
    },

    methods: {
        store(url) {
            this.loading = true;
            window.axios.post(url, this.form).then(response => {
                this.loading = false;
                this.errors = {};
            }).catch(error => {
                this.loading = false;
                if (error.response.status === 422) {
                    this.errors = error.response.data;
                    window.toastr.error('При регистрации произошла ошибка.')
                }
            })
        }
    }
});
