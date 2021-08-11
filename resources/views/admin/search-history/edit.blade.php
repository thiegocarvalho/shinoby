@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.search-history.actions.edit', ['name' => $searchHistory->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <search-history-form
                :action="'{{ $searchHistory->resource_url }}'"
                :data="{{ $searchHistory->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.search-history.actions.edit', ['name' => $searchHistory->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.search-history.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </search-history-form>

        </div>
    
</div>

@endsection