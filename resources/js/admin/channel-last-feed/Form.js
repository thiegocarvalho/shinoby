import AppForm from '../app-components/Form/AppForm';

Vue.component('channel-last-feed-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                channel_platform_id:  '' ,
                feed_platform_id:  '' ,
                title:  '' ,
                description:  '' ,
                thumbnail_url:  '' ,
                views:  '' ,
                rating:  '' ,
                url:  '' ,
                platform_published_at:  '' ,
                platform_updated_at:  '' ,
                
            }
        }
    }

});