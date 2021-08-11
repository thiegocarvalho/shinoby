<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'channel' => [
        'title' => 'Channel',

        'actions' => [
            'index' => 'Channel',
            'create' => 'New Channel',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'channel_platform_id' => 'Channel platform',
            'platform' => 'Platform',
            'last_sync_at' => 'Last sync at',
            
        ],
    ],

    'channel-last-feed' => [
        'title' => 'Channel Last Feed',

        'actions' => [
            'index' => 'Channel Last Feed',
            'create' => 'New Channel Last Feed',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'channel_platform_id' => 'Channel platform',
            'feed_platform_id' => 'Feed platform',
            'title' => 'Title',
            'description' => 'Description',
            'thumbnail_url' => 'Thumbnail url',
            'views' => 'Views',
            'rating' => 'Rating',
            'url' => 'Url',
            'platform_published_at' => 'Platform published at',
            'platform_updated_at' => 'Platform updated at',
            
        ],
    ],

    'searcg-history' => [
        'title' => 'Searcg History',

        'actions' => [
            'index' => 'Searcg History',
            'create' => 'New Searcg History',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'channel-last-feed' => [
        'title' => 'Channel Last Feed',

        'actions' => [
            'index' => 'Channel Last Feed',
            'create' => 'New Channel Last Feed',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'channel_platform_id' => 'Channel platform',
            'feed_platform_id' => 'Feed platform',
            'title' => 'Title',
            'description' => 'Description',
            'thumbnail_url' => 'Thumbnail url',
            'views' => 'Views',
            'rating' => 'Rating',
            'url' => 'Url',
            'platform_published_at' => 'Platform published at',
            'platform_updated_at' => 'Platform updated at',
            
        ],
    ],

    'channel' => [
        'title' => 'Channel',

        'actions' => [
            'index' => 'Channel',
            'create' => 'New Channel',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'channel_platform_id' => 'Channel platform',
            'platform' => 'Platform',
            'last_sync_at' => 'Last sync at',
            
        ],
    ],

    'search-history' => [
        'title' => 'Search History',

        'actions' => [
            'index' => 'Search History',
            'create' => 'New Search History',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'seach_term' => 'Seach term',
            'hits' => 'Hits',
            
        ],
    ],

    'search-history' => [
        'title' => 'Search History',

        'actions' => [
            'index' => 'Search History',
            'create' => 'New Search History',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'term' => 'Term',
            'hits' => 'Hits',
            
        ],
    ],

    'help' => [
        'title' => 'Help',

        'actions' => [
            'index' => 'Help',
            'create' => 'New Help',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'search-history' => [
        'title' => 'Search History',

        'actions' => [
            'index' => 'Search History',
            'create' => 'New Search History',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'term' => 'Term',
            'hits' => 'Hits',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];