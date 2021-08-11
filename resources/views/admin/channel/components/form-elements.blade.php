<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.channel.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.channel.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('channel_platform_id'), 'has-success': fields.channel_platform_id && fields.channel_platform_id.valid }">
    <label for="channel_platform_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.channel.columns.channel_platform_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.channel_platform_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('channel_platform_id'), 'form-control-success': fields.channel_platform_id && fields.channel_platform_id.valid}" id="channel_platform_id" name="channel_platform_id" placeholder="{{ trans('admin.channel.columns.channel_platform_id') }}">
        <div v-if="errors.has('channel_platform_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('channel_platform_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('platform'), 'has-success': fields.platform && fields.platform.valid }">
    <label for="platform" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.channel.columns.platform') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.platform" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('platform'), 'form-control-success': fields.platform && fields.platform.valid}" id="platform" name="platform" placeholder="{{ trans('admin.channel.columns.platform') }}">
        <div v-if="errors.has('platform')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('platform') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('last_sync_at'), 'has-success': fields.last_sync_at && fields.last_sync_at.valid }">
    <label for="last_sync_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.channel.columns.last_sync_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.last_sync_at" :config="datetimePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('last_sync_at'), 'form-control-success': fields.last_sync_at && fields.last_sync_at.valid}" id="last_sync_at" name="last_sync_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('last_sync_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('last_sync_at') }}</div>
    </div>
</div>


