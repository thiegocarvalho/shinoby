<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,

    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Channel::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'channel_platform_id' => $faker->sentence,
        'platform' => $faker->sentence,
        'last_sync_at' => $faker->dateTime,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ChannelLastFeed::class, static function (Faker\Generator $faker) {
    return [
        'channel_platform_id' => $faker->sentence,
        'feed_platform_id' => $faker->sentence,
        'title' => $faker->sentence,
        'description' => $faker->text(),
        'thumbnail_url' => $faker->sentence,
        'views' => $faker->sentence,
        'rating' => $faker->sentence,
        'url' => $faker->sentence,
        'platform_published_at' => $faker->dateTime,
        'platform_updated_at' => $faker->dateTime,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\SearchHistory::class, static function (Faker\Generator $faker) {
    return [
        'seach_term' => $faker->text(),
        'hits' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\SearchHistory::class, static function (Faker\Generator $faker) {
    return [
        'term' => $faker->text(),
        'hits' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Help::class, static function (Faker\Generator $faker) {
    return [


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\SearchHistory::class, static function (Faker\Generator $faker) {
    return [
        'term' => $faker->text(),
        'hits' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\SearchHistory::class, static function (Faker\Generator $faker) {
    return [
        'term' => $faker->sentence,
        'hits' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
