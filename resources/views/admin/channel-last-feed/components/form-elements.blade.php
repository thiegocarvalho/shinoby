<div class="form-group row align-items-center" :class="{'has-danger': errors.has('channel_platform_id'), 'has-success': fields.channel_platform_id && fields.channel_platform_id.valid }">
    <label for="channel_platform_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.channel-last-feed.columns.channel_platform_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.channel_platform_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('channel_platform_id'), 'form-control-success': fields.channel_platform_id && fields.channel_platform_id.valid}" id="channel_platform_id" name="channel_platform_id" placeholder="{{ trans('admin.channel-last-feed.columns.channel_platform_id') }}">
        <div v-if="errors.has('channel_platform_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('channel_platform_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('feed_platform_id'), 'has-success': fields.feed_platform_id && fields.feed_platform_id.valid }">
    <label for="feed_platform_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.channel-last-feed.columns.feed_platform_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.feed_platform_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('feed_platform_id'), 'form-control-success': fields.feed_platform_id && fields.feed_platform_id.valid}" id="feed_platform_id" name="feed_platform_id" placeholder="{{ trans('admin.channel-last-feed.columns.feed_platform_id') }}">
        <div v-if="errors.has('feed_platform_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('feed_platform_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('title'), 'has-success': fields.title && fields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.channel-last-feed.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('title'), 'form-control-success': fields.title && fields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.channel-last-feed.columns.title') }}">
        <div v-if="errors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('title') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.channel-last-feed.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('thumbnail_url'), 'has-success': fields.thumbnail_url && fields.thumbnail_url.valid }">
    <label for="thumbnail_url" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.channel-last-feed.columns.thumbnail_url') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.thumbnail_url" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('thumbnail_url'), 'form-control-success': fields.thumbnail_url && fields.thumbnail_url.valid}" id="thumbnail_url" name="thumbnail_url" placeholder="{{ trans('admin.channel-last-feed.columns.thumbnail_url') }}">
        <div v-if="errors.has('thumbnail_url')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('thumbnail_url') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('views'), 'has-success': fields.views && fields.views.valid }">
    <label for="views" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.channel-last-feed.columns.views') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.views" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('views'), 'form-control-success': fields.views && fields.views.valid}" id="views" name="views" placeholder="{{ trans('admin.channel-last-feed.columns.views') }}">
        <div v-if="errors.has('views')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('views') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('rating'), 'has-success': fields.rating && fields.rating.valid }">
    <label for="rating" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.channel-last-feed.columns.rating') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.rating" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('rating'), 'form-control-success': fields.rating && fields.rating.valid}" id="rating" name="rating" placeholder="{{ trans('admin.channel-last-feed.columns.rating') }}">
        <div v-if="errors.has('rating')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('rating') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('url'), 'has-success': fields.url && fields.url.valid }">
    <label for="url" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.channel-last-feed.columns.url') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.url" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('url'), 'form-control-success': fields.url && fields.url.valid}" id="url" name="url" placeholder="{{ trans('admin.channel-last-feed.columns.url') }}">
        <div v-if="errors.has('url')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('url') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('platform_published_at'), 'has-success': fields.platform_published_at && fields.platform_published_at.valid }">
    <label for="platform_published_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.channel-last-feed.columns.platform_published_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.platform_published_at" :config="datetimePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('platform_published_at'), 'form-control-success': fields.platform_published_at && fields.platform_published_at.valid}" id="platform_published_at" name="platform_published_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('platform_published_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('platform_published_at') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('platform_updated_at'), 'has-success': fields.platform_updated_at && fields.platform_updated_at.valid }">
    <label for="platform_updated_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.channel-last-feed.columns.platform_updated_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.platform_updated_at" :config="datetimePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('platform_updated_at'), 'form-control-success': fields.platform_updated_at && fields.platform_updated_at.valid}" id="platform_updated_at" name="platform_updated_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('platform_updated_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('platform_updated_at') }}</div>
    </div>
</div>


