<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('/', [\App\Http\Controllers\ChannelController::class, 'registerChannel']);

Route::match(['get', 'post'], '/bot', 'App\Http\Controllers\BotController@handle');

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('channels')->name('channels/')->group(static function() {
            Route::get('/',                                             'ChannelController@index')->name('index');
            Route::get('/create',                                       'ChannelController@create')->name('create');
            Route::post('/',                                            'ChannelController@store')->name('store');
            Route::get('/{channel}/edit',                               'ChannelController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ChannelController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{channel}',                                   'ChannelController@update')->name('update');
            Route::delete('/{channel}',                                 'ChannelController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('channel-last-feeds')->name('channel-last-feeds/')->group(static function() {
            Route::get('/',                                             'ChannelLastFeedController@index')->name('index');
            Route::get('/create',                                       'ChannelLastFeedController@create')->name('create');
            Route::post('/',                                            'ChannelLastFeedController@store')->name('store');
            Route::get('/{channelLastFeed}/edit',                       'ChannelLastFeedController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ChannelLastFeedController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{channelLastFeed}',                           'ChannelLastFeedController@update')->name('update');
            Route::delete('/{channelLastFeed}',                         'ChannelLastFeedController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('search-histories')->name('search-histories/')->group(static function() {
            Route::get('/',                                             'SearchHistoryController@index')->name('index');
            Route::get('/create',                                       'SearchHistoryController@create')->name('create');
            Route::post('/',                                            'SearchHistoryController@store')->name('store');
            Route::get('/{searchHistory}/edit',                         'SearchHistoryController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SearchHistoryController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{searchHistory}',                             'SearchHistoryController@update')->name('update');
            Route::delete('/{searchHistory}',                           'SearchHistoryController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('helps')->name('helps/')->group(static function() {
            Route::get('/',                                             'HelpController@index')->name('index');
            Route::get('/create',                                       'HelpController@create')->name('create');
            Route::post('/',                                            'HelpController@store')->name('store');
            Route::get('/{help}/edit',                                  'HelpController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'HelpController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{help}',                                      'HelpController@update')->name('update');
            Route::delete('/{help}',                                    'HelpController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('search-histories')->name('search-histories/')->group(static function() {
            Route::get('/',                                             'SearchHistoryController@index')->name('index');
            Route::get('/create',                                       'SearchHistoryController@create')->name('create');
            Route::post('/',                                            'SearchHistoryController@store')->name('store');
            Route::get('/{searchHistory}/edit',                         'SearchHistoryController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SearchHistoryController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{searchHistory}',                             'SearchHistoryController@update')->name('update');
            Route::delete('/{searchHistory}',                           'SearchHistoryController@destroy')->name('destroy');
        });
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

