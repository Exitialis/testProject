Vue.component('profile', {

    props: {
        profileGetUrl: {
            type: String,
            required: true
        }
    },

    data() {
        return {
            errors: {},
            profile: {},
            form: {
                name: null,
                phone: null,
            },
            loading: false,
        }
    },

    methods: {
        getProfile() {
            this.loading = true;
            window.axios.get(this.profileGetUrl).then(response => {
                let profile = response.data.profile;
                this.profile = profile;
                this.form.name = profile.name;
                this.form.phone = profile.phone;
                this.loading = false;
                this.errors = {};
            }).catch(error => {
                this.loading = false;
                if (error.response.status === 422) {
                    this.errors = error.response.data;
                    window.toastr.error('При получении данных произошла ошибка.')
                }
            })
        },
        store(url) {
            this.loading = true;
            window.axios.put(url, this.form).then(response => {
                this.loading = false;
                this.errors = {};
            }).catch(error => {
                this.loading = false;
                if (error.response.status === 422) {
                    this.errors = error.response.data;
                    window.toastr.error('При сохранении произошла ошибка.')
                }
            })
        }
    },

    created() {
        this.loading = true;
        this.getProfile();
    }
});
