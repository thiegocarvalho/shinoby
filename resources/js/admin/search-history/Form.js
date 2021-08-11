import AppForm from '../app-components/Form/AppForm';

Vue.component('search-history-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                term:  '' ,
                hits:  '' ,
                
            }
        }
    }

});