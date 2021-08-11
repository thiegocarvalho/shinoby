@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.channel-last-feed.actions.edit', ['name' => $channelLastFeed->title]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <channel-last-feed-form
                :action="'{{ $channelLastFeed->resource_url }}'"
                :data="{{ $channelLastFeed->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.channel-last-feed.actions.edit', ['name' => $channelLastFeed->title]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.channel-last-feed.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </channel-last-feed-form>

        </div>
    
</div>

@endsection