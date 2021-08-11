import AppForm from '../app-components/Form/AppForm';

Vue.component('help-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                
            }
        }
    }

});