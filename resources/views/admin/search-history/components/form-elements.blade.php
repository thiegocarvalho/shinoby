<div class="form-group row align-items-center" :class="{'has-danger': errors.has('term'), 'has-success': fields.term && fields.term.valid }">
    <label for="term" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.search-history.columns.term') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.term" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('term'), 'form-control-success': fields.term && fields.term.valid}" id="term" name="term" placeholder="{{ trans('admin.search-history.columns.term') }}">
        <div v-if="errors.has('term')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('term') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('hits'), 'has-success': fields.hits && fields.hits.valid }">
    <label for="hits" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.search-history.columns.hits') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.hits" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('hits'), 'form-control-success': fields.hits && fields.hits.valid}" id="hits" name="hits" placeholder="{{ trans('admin.search-history.columns.hits') }}">
        <div v-if="errors.has('hits')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('hits') }}</div>
    </div>
</div>


