import AppForm from '../app-components/Form/AppForm';

Vue.component('channel-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                channel_platform_id:  '' ,
                platform:  '' ,
                last_sync_at:  '' ,
                
            }
        }
    }

});