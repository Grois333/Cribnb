//Mixins are shared and availabale for any component to use and save more time

export default {
    data() {
        return {
            errors: null
        };
    },
    methods: {
        errorFor(field) {
            return null !== this.errors && this.errors[field]
                ? this.errors[field]
                : null;
        }
    }
};