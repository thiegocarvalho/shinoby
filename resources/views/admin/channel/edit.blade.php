@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.channel.actions.edit', ['name' => $channel->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <channel-form
                :action="'{{ $channel->resource_url }}'"
                :data="{{ $channel->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.channel.actions.edit', ['name' => $channel->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.channel.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </channel-form>

        </div>
    
</div>

@endsection