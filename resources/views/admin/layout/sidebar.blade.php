<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/channels') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.channel.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/channel-last-feeds') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.channel-last-feed.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/search-histories') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.search-history.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/helps') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.help.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
